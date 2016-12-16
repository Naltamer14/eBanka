<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('geslo123'),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisDecade->format('Y-m-d')
    ];
});

$factory->defineAs(App\User::class, 'Klemen', function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Klemen',
        'email' => 'naltamer14@gmail.com',
        'password' => $password ?: $password = bcrypt('geslo123'),
        'remember_token' => str_random(10),
    ];
});