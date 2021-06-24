<?php

use App\Models\Plan;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Plan::class, function () {
    return [
        'count_books' => 2,
        'price' => 25,
        'slug' => 'beginner',
        'img' => "priceItem1.png",
    ];
});
