<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(App\Models\Training::class, function (Faker $faker) {

    $date = \Carbon\Carbon::create(
        $faker->numberBetween(2018, 2020),
        $faker->numberBetween(1, 12),
        $faker->numberBetween(1, 28)
        );
    $date = $faker->dateTimeBetween('2018-01-01', '2020-01-01');
    $times = [8, 10, 12, 14, 16, 18, 20, 22, 0];
    $user = $this->faker->boolean(30) ? $this->faker->randomElement(User::all())->id : 0;

        return [
            'date' => $date,
            'time' => $faker->randomElement($times),
            'booked_by' => $user,
        ];
});
