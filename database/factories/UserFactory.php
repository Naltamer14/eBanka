<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $gender = $faker->boolean;
    if($gender) {
        $sex = 'female';
    } else {
        $sex = 'male';
    }

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('geslo123'),
        'phone_number' => $faker->phoneNumber,
        'name' => $faker->firstName($sex),
        'surname' => $faker->lastName,
        'country' => $faker->country,
        'city' => $faker->city,
        'post_number' => $faker->postcode,
        'gender' => $gender,
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisDecade->format('Y-m-d')
    ];
});

$factory->defineAs(App\User::class, 'Klemen', function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => 'naltamer14@gmail.com',
        'password' => $password ?: $password = bcrypt('geslo123'),
        'phone_number' => $faker->phoneNumber,
        'name' => 'Klemen',
        'surname' => 'Poličar',
        'country' => 'Slovenija',
        'city' => 'Brezje',
        'post_number' => '4243',
        'gender' => false,
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisDecade->format('Y-m-d')
    ];
});