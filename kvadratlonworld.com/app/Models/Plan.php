<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Plan extends Model
{
    protected $fillable = ["count_books", "price", "img", "slug"];

    public function plan_text(){
        return $this->hasMany(PlanText::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index():Collection
    {
        return $this->with([
            'plan_text'=>function($query){
                $query->where('locale', App::getLocale());
            }
        ])->get();
    }
}