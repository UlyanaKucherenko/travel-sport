<?php

namespace App\Http\Transformers\Plan;

use \Illuminate\Support\Collection;
use App\Http\Transformers\CollectionTransformerInterface;
use Illuminate\Support\Str;

class SelectPlanTransformer implements CollectionTransformerInterface
{
    protected $currentPlan;

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param string $currentPlan
     * @return \Illuminate\Support\Collection
     */
    public function transformWithSetPlan(Collection $collection, string $currentPlan): Collection
    {
        $this->currentPlan = $currentPlan;
        return $this->transform($collection);
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     * @return \Illuminate\Support\Collection
     */
    public function transform(Collection $collection): Collection
    {
        return $collection->map(function ($item){
            if(Str::slug($item->slug) == Str::slug($this->currentPlan)){
                $item->currentPlan = true;
            }else{
                $item->currentPlan = false;
            }
            return $item;
        });
    }
}