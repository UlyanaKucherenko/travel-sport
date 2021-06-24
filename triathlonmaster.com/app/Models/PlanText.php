<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanText extends Model
{
    protected $fillable = ["plan_id", "locale", "title", "text1", "text2", "trial"];
}
