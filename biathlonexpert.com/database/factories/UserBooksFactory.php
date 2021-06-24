<?php

use App\Models\User;
use App\Models\Book;
use App\Models\UsersBook;
use Faker\Generator as Faker;

$factory->define(UsersBook::class, function (Faker $faker) {
    return [
        'book_id' => $faker->randomElement(Book::all()->toArray())['id'],
        'user_id' => $faker->randomElement(User::all()->toArray())['id'],
    ];
});
