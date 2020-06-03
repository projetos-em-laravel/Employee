<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'user_id' => 1,
        'image' => '143709202006035ed7b5959de7bwebp',
    ];
});
