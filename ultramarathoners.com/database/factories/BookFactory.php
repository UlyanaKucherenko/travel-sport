<?php

use Faker\Generator as Faker;
use App\Models\Book;

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

$factory->define(Book::class, function (Faker $faker) {
    return [
        "img" => "google.com",
        "src" => "google.com",
        "title" => $faker->title,
        "category" => "workout",
        "plan_id" => 1,
    ];
});
