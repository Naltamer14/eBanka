<?php

$factory->define(App\Transaction::class, function (Faker\Generator $faker) {

    $random_user_id = $faker->biasedNumberBetween(1, App\User::all()->count());
    $user_accounts = App\User::find($random_user_id)->accounts;
    $random_account_id = $user_accounts[($faker->biasedNumberBetween(0, ($user_accounts->count() - 1)))]->id;

    $amount = $faker->biasedNumberBetween(-1000, 1000);

    $account = App\User::find($random_user_id)->accounts->where('id', $random_account_id)->first();
    $account->balance += $amount;
    $account->save();

    return [
        'account_id' => $random_account_id,
        'user_id'  => $random_user_id,
        'purpose' => $faker->text(60),
        'amount' => $amount,
        'ip_address' => $faker->ipv4,
        'transferred_at' => $faker->dateTimeThisDecade->format('Y-m-d'),
    ];
});