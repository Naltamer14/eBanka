<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public $amount = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating Klemen user...');
        factory(App\User::class, 'Klemen')->create();
        $this->command->info('- Created.');

        $this->command->info('Creating ' . $this->amount . ' additional users...');
        factory(App\User::class, 5)->create();
        $this->command->info('- Created.');

    }
}
