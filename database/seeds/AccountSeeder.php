<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->truncate();

        foreach (App\User::all() as $user)
        {
            \App\Account::createPrimary($user);
        }
    }
}
