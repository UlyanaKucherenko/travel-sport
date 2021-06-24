<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\UserData::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(\App\Models\User::all())->id,
        'purpose' => $faker->numberBetween(0, 3),
        'height' => $faker->numberBetween(140, 220),
        'weight' => $faker->numberBetween(40, 160),
        'hip' => $faker->numberBetween(50, 120),
        'systolic' => $faker->numberBetween(80, 250),
        'diastolic' => $faker->numberBetween(40, 160),

    ];
});
