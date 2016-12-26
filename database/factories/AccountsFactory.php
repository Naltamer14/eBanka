<?php

$factory->define(App\Account::class, function (Faker\Generator $faker) {

    $random_user_id = $faker->biasedNumberBetween(1, App\User::all()->count());
    if(App\Account::all()->count() > 1)
    {
        $random_account_fallback = $faker->biasedNumberBetween(1, App\Account::all()->count() - 1);
    }
    else
    {
        $random_account_fallback = null;
    }

    return [
        'user_id'  => $random_user_id,
        'name' => $faker->text(20),
        'card_number' => $faker->creditCardNumber(),
        'card_approved_until' => $faker->dateTimeBetween('now', '10 years')->format('Y-m-d'),
        'type' => $faker->biasedNumberBetween(0, 3),
        'balance' => $faker->biasedNumberBetween(-100, 100),
        'limit' => $faker->biasedNumberBetween(0, 1000),
        'limit_approved_until' => $faker->dateTimeBetween('now', '10 years')->format('Y-m-d'),
        'fallback_account' => $random_account_fallback,
        'created_at' => $faker->dateTimeThisDecade->format('Y-m-d')
    ];
});