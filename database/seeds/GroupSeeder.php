<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public $amount = 10 ;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Deleting Groups table...');
        DB::table('groups')->delete();
        $this->command->info('- Deleted.');

        $this->command->info('Creating ' . $this->amount . ' groups...');
        factory(App\Group::class, $this->amount)->create();
        $this->command->info('- Created.');
    }
}
