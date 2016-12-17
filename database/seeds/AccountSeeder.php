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
        DB::table('accounts')->delete();

        foreach (App\User::all() as $user)
        {
            factory(App\Account::class)->create([
                'user_id'  => $user->id,
                'name' => 'Primarni račun',
                'fallback_account' => null
            ]);
        }

        factory(App\Account::class, 50)->create();
    }
}
