<?php

use App\Group;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserGroupsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Assigning ' . 30 . ' users to groups...');
        $role = Role::where('name', 'user')->first();
        foreach (range(0, 30) as $i)
        {
            $user = User::find(random_int(User::first()->id, (User::first()->id + User::all()->count() - 1)));
            $group = Group::find(random_int(Group::first()->id, (Group::first()->id + Group::all()->count() - 1)));
            $user->attachRole($role, $group);
        }
        $this->command->info('- Assigned.');

        $this->command->info('Assigning ' . 80 . ' accounts to groups...');
        foreach (range(0, 80) as $i)
        {
            do
            {
                $group = Group::find(random_int(Group::first()->id, (Group::first()->id + Group::all()->count() - 1)));
            } while($group->users->isEmpty());
            
            $user = $group->users->random();
            $account = $user->accounts->random();

            $group->accounts()->attach($account);
        }
        $this->command->info('- Assigned.');
    }
}
