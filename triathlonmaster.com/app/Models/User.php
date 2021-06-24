<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'subscribe_status' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'phone',
        'postal_code',
        'plan_id',
        'subscribe_status',
        'subscribe_date',
        'role',
        'orderId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the books for the user.
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'users_books')->withTimestamps();
    }
    /**
     * Get the plan for the user.
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    public function getUsersToUpdate()
    {
        return self::whereDate('updated_at', '<=', Carbon::today()->subMonth())
            ->where('status', '1')
            ->get();
    }

    /**
     * @param array $params
     * @return \App\Models\User
     */
    public function createUser(array $params): User
    {
        $user_params = [
            'email' => $params['email'],
            'password' => bcrypt($params['password']),
            'first_name' => $params['first_name'],
            'last_name' => $params['last_name'],
            'address' => $params['address'],
            'city' => $params['city'],
            'country' => $params['country'],
            'phone' => $params['phone'],
            'postal_code' => $params['postal_code'],
            'plan_id' => $params['plan_id'] ?? 1,
            'subscribe_status' => $params['subscribe_status'] ?? 0,
            'subscribe_date' => $params['subscribe_date'] ?? Carbon::now()->format('Y-m-d H:i:s'),
        ];
        if (isset($params['order'])) {
            $user_params['orderId'] = $params['order'];
        }
        $user = $this->create($user_params);
        $user->bodyParams()->save(new UserData());
        return $user->load("plan");
    }



    public function canDownload($book_id=0)
    {
        $alreadyDownloaded = $this->books()
            ->whereBook($book_id)
            ->exists();

        if ($alreadyDownloaded){
            return true;
        }

        $tableName = $this->books()->getTable();

        $booksDownloadedLastWeek = $this->books()
            ->whereBetween("$tableName.created_at", [Carbon::now()->subDays(7), Carbon::now()])
            ->count(); //books, downloaded last week by user

        if ($booksDownloadedLastWeek < $this->plan->count_books) {
            return true;
        }

        return false;
    }


    /**
     * @param array $request
     * @return bool
     */
    public function updateUser($request ): bool
    {
        $user = auth()->user();
        $user->bodyParams()->update($request['data'])
            ->except(['created_at', 'updated_at', 'id', 'user_id']);

        return $user->update($request
            ->only([
                'first_name', 'last_name', 'address', 'country', 'city', 'phone', 'postal_code',])
            ->toArray()
        );
    }

    /**
     * @return string
     */
    public function getExpirationDataAttribute(): string
    {
        if ($this->subscribe_date) {
            return $this->getExpirationData()->format('d/m/Y');
        }
        return "No subscribe yet";
    }

    /**
     * @return bool
     */
    public function getIsUserSubscribeActiveAttribute(): bool
    {
        return $this->subscribe_status && $this->subscribe_date && $this->isSubscribeExpired();
    }

    /**
     * @return bool
     */
    public function isSubscribeExpired(): bool
    {
        return now()->lessThan($this->getExpirationData());
    }

    public function getManageUserData(): Collection
    {
        return collect([
            "status" => $this->getIsUserSubscribeActiveAttribute(),
            "subscribe_date" => $this->getSubscribeDataAttribute(),
            "expired_date" => $this->getExpirationDataAttribute(),
        ]);
    }

    /**
     * @return \Carbon\Carbon
     */
    private function getExpirationData(): Carbon
    {
        if ($this->subscribe_status) {
            return Carbon::parse($this->subscribe_date)->addMonth();
        } else {
            return Carbon::parse($this->subscribe_date);
        }
    }

    /**
     * @return string
     */
    private function getSubscribeDataAttribute(): string
    {
        return Carbon::parse($this->subscribe_date)->format('d/m/Y');
    }

    /**
     * Accessors for get full user's name
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * @param \App\Models\User $user
     * @return bool
     */
    public function unsubscribeUser(User $user): bool
    {

        return $user->update([
            "subscribe_status" => false
        ]);
    }

    /**
     * @param string $email
     * @return bool
     */
    public function unsubscribeUserPost(string $email): bool
    {
        $user = $this->where('email', $email)->first();
        if ($user) {
            return $this->unsubscribeUser($user);
        }

        return false;
    }

    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }


    public function bodyParams()
    {
        return $this->hasOne('App\Models\UserData');
    }

    /**
     * attaches only new books.
     * prevents similar record in pivot table
     * @param $book_id
     */
    public function attachBook($book_id)
    {
        $books = $this->books();
        $alreadyDownloaded = $books->find($book_id);
        if($alreadyDownloaded){
            $alreadyDownloaded->touch();
        }else{
            $books->attach($book_id);
        }
    }

}