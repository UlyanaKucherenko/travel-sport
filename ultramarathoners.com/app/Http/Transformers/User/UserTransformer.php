<?php

namespace App\Http\Transformers\User;

use App\Models\User;
use \Illuminate\Support\Collection;
use App\Http\Transformers\CollectionTransformerInterface;

class UserTransformer implements CollectionTransformerInterface
{
    /**
     * @param \App\Models\User $user
     * @return \Illuminate\Support\Collection
     */
    public function transUsersData(User $user): Collection
    {
        return $this->transform(collect($user));
    }

    /**
     * @param \Illuminate\Support\Collection $user
     * @return \Illuminate\Support\Collection
     */
    public function transform(Collection $user): Collection
    {
        return collect([
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'address' => $user['address'],
            'city' => $user['city'],
            'country' => $user['country'],
            'phone' => $user['phone'],
            'postal_code' => $user['postal_code'],
            'plan_id' => $user['plan_id'],
            'plan_name' => $user['plan']['slug'],
            'plan_price' => $user['plan']['price'],
            'home' => route('home'),
            'contact_phone' => "+48 71 881 00 24",
        ]);
    }
}
