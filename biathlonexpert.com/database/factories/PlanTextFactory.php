<?php

use App\Models\PlanText;

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

$factory->define(PlanText::class, function () {
    return [
        'plan_id' => 1,
        'locale' => 'en',

        'title' => "Beginner",
        'text1' => "2 ebooks per week",
        'text2' => "Workouts plan for a day",
        'trial' => "Trial period of 5 days at 3 ",
    ];
});
