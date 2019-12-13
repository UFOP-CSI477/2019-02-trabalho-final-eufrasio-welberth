<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Server_User;
use Faker\Generator as Faker;

$factory->define(Server_User::class, function (Faker $faker) {
    $servers = App\Server::pluck('id')->toArray();
    $users = App\User::pluck('id')->toArray();
    return [
        'character' => $faker->name,
        'started' => $faker->date,
        'server_id' => $faker->randomElement($servers),
        'user_id' => $faker->randomElement($users),
        'period' => $faker->numberBetween($min = 0, $max = 3),

    ];
});
