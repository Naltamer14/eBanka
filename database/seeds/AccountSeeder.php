<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    public $amount = 60;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Deleting Accounts table...');
        DB::table('accounts')->delete();
        $this->command->info('- Deleted.');


        $this->command->info('Creating ' .App\User::all()->count() . ' primary accounts...');
        foreach (App\User::all() as $user)
        {
            factory(App\Account::class)->create([
                'user_id'  => $user->id,
                'name' => 'Primarni račun',
                'fallback_account' => null
            ]);
        }
        $this->command->info('- Created.');

        $this->command->info('Creating ' . $this->amount . ' additional accounts...');
        factory(App\Account::class, $this->amount)->create();
        $this->command->info('- Created.');
    }
}
