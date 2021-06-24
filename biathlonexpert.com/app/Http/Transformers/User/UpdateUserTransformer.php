<?php

namespace App\Http\Transformers\User;

use \Illuminate\Support\Collection;
use App\Http\Transformers\CollectionTransformerInterface;

class UpdateUserTransformer implements CollectionTransformerInterface
{
    /**
     * @param array $user
     * @return \Illuminate\Support\Collection
     */
    public function transUsersData(array $user): Collection
    {
        return $this->transform(collect($user));
    }

    /**
     * @param \Illuminate\Support\Collection $user
     * @return \Illuminate\Support\Collection
     */
    public function transform(Collection $user): Collection
    {
        return collect($user)->filter(function ($value, $key){
            return !!$value;
        });
    }
}