<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Server;
use Faker\Generator as Faker;

$factory->define(Server::class, function (Faker $faker) {
    $games = App\Game::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'game_id' => $faker->randomElement($games),
    ];
});
