<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'title' =>$faker->sentence,
        'body' =>$faker->paragraph,
        'free' =>$faker->boolean()
    ];
});
