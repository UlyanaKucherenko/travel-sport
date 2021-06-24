<?php

namespace App\Http\Transformers;

use \Illuminate\Support\Collection;

interface CollectionTransformerInterface
{
    /**
     * @param \Illuminate\Support\Collection $collection
     * @return \Illuminate\Support\Collection
     */
    public function transform(Collection $collection): Collection;
}