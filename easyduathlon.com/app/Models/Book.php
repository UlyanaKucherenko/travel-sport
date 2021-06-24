<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class Book extends Model
{
    public $table = 'books';

    protected $fillable = [
        'title',
        'img',
        'src',
        'category',
        'category_id',
        'plan_id',
        'sort',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'sort',
        'category',
        'category_id',
        'pivot',
    ];

    public function scopeWhereBook(Builder $query, $book)
    {
        $query->whereKey($book);
    }

    /**
     * @param \App\Models\User $user
     * @return array
     */
    private function getPlansIdsArray(User $user): array
    {
        $result = [];
        for ($i = 1; $i <= $user->plan_id; $i++) {
            $result[] = $i;
        }
        return $result;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function getBooks(Request $request): Collection
    {
        $user = auth()->user();

        if ($user->canDownload()) {
            $query = $this->select();
            $query->whereIn('plan_id', $this->getPlansIdsArray($user))
                ->orderBy('category_id', 'asc');

            return collect($query->paginate(12)->toArray());
        } else {
            return collect(['data' => $user->books->toArray()]);
        }
    }


    /**
     * @return int
     */
    public function getBooksPlanCount(): int
    {
        $query = $this->select();
        $query->whereIn('plan_id', $this->getPlansIdsArray(auth()->user()));
        return $query->count();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getRandomTheeBooks(): Collection
    {
        $query = $this->select();
        $query->whereIn('plan_id', $this->getPlansIdsArray(auth()->user()))
            ->orderBy('category_id', 'asc')
            ->limit(3);
        return collect($query->get()->toArray());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findAllowedBook($id): Book
    {
        return $this->where('id', '=', $id)->whereIn('plan_id', $this->getPlansIdsArray(auth()->user()))->firstOrFail();
    }

    /**
     * Get all book catalog titles
     */
    public static function getBooksFromDir()
    {
        $books = Storage::disk('local')->directories('books');

        if (!$books) return false;

        $newBooks = [];
        foreach ($books as $dir) {
            $book['title'] = str_replace('books/', '', $dir);

            $book = array_merge($book, self::getFiles($dir));

            $newBooks[$book['title']] = $book;
        }

        return $newBooks;
    }

    public static function getFiles($dir)
    {
        $files = Storage::disk('local')->files($dir);

        $book = [];

        foreach ($files as $file) {
            if (strpos($file, '.jpg') || strpos($file, '.png')) {
                $book['img'] = $file;
            } else if (strpos($file, '.pdf')) {
                $book['src'] = $file;
            }
        }

        return $book;
    }

    public function save(array $options = [])
    {
        Storage::disk('public')->put($this->img, Storage::get($this->img));

        return parent::save($options);
    }

    /**
     * Get the users for the book.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'users_books')->withTimestamps();
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


    public function bestBook()
    {
        $bestBook = UsersBook::query()
            ->groupBy('book_id')
            ->selectRaw('count(id) as ct, book_id')
            ->orderBy('ct', 'desc')
            ->first();
        $bestBookId = $bestBook->book_id ?? 1;
        return $this->find($bestBookId)->only(['id', 'img', 'title']);
    }

    public function popularBooks()
    {
        $bestBooks = UsersBook::query()
            ->groupBy('book_id')
            ->selectRaw('count(id) as ct, book_id')
            ->orderBy('ct', 'desc')
            ->limit(5);

        return $this->formatData($bestBooks);
    }


    public function recentBooks()
    {
        $user = auth()->user();
        if (isset($user->id)) {
            $recentBooks = UsersBook::query()
                ->where('user_id', '=', $user->id)
                ->orderBy('id', 'desc')
                ->limit(5);

            return $this->formatData($recentBooks);
        }
        return [];
    }

    private function formatData($data)
    {
        $data = $data
            ->get(['book_id'])
            ->map(function ($el) {
            return $el->book_id;
        });

        return collect($this->find($data)->map(function ($el) {

            return ['book' => [
                'id' => $el->id,
                'img' => $el->img,
                'title' => $el->title,
            ]];
        }));
    }
}
