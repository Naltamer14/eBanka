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
            factory(App\Account::class)->create([
                'user_id'  => $user->id,
                'name' => 'Primary account',
                'fallback_account' => null
            ]);
        }

        factory(App\Account::class, 50)->create();
    }
}
