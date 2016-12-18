<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public $amount = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Deleting Transactions table...');
        DB::table('transactions')->delete();
        $this->command->info('- Deleted.');

        $this->command->info('Creating ' . $this->amount . ' transaction records...');
        factory(App\Transaction::class, $this->amount)->create();
        $this->command->info('- Created.');
    }
}
