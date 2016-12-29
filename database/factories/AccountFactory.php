<?php

$factory->define(App\Account::class, function (Faker\Generator $faker) {

    $random_user_id = $faker->biasedNumberBetween(App\User::first()->id, (App\User::first()->id + App\User::all()->count() - 1));
    $user = App\User::find($random_user_id);
    if($user->accounts->count())
    {
        $random_account_fallback = ($user->accounts[$faker->biasedNumberBetween(0, $user->accounts->count() - 1)])->id;
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