<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $this->command->info('Deleting Users, Roles, Groups and Permissions tables');
        $this->deleteLaratrustTables();
        
        $config = config('laratrust_seeder.role_structure');
        $userPermission = config('laratrust_seeder.permission_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {
            // Create a new role
            $role = \App\Role::create([
                'name' => $key,
                'display_name' => ucfirst($key),
                'description' => ucfirst($key)
            ]);

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {
                $permissions = explode(',', $value);

                foreach ($permissions as $p => $perm) {
                    $permissionValue = $mapPermission->get($perm);

                    $permission = \App\Permission::firstOrCreate([
                        'name' => $module . '-' . $permissionValue,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ]);

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                    
                    if (!$role->hasPermission($permission->name)) {
                        $role->attachPermission($permission);
                    } else {
                        $this->command->info($key . ': ' . $p . ' ' . $permissionValue . ' already exist');
                    }
                }
            }

            // Create default user for each role
            $this->command->info("Creating '{$key}' user");
            $user = factory(App\User::class)->create([
                'username' => ucfirst($key),
                'email' => $key.'@app.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ]);
            $user->attachRole($role);
        }

        // creating user with permissions
        if (!empty($userPermission)) {
            foreach ($userPermission as $key => $modules) {
                foreach ($modules as $module => $value) {
                    $permissions = explode(',', $value);
                    // Create default user for each permission set
                    $user = factory(App\User::class)->create([
                        'username' => ucfirst($key),
                        'email' => $key.'@app.com',
                        'password' => bcrypt('password'),
                        'remember_token' => str_random(10),
                    ]);
                    foreach ($permissions as $p => $perm) {
                        $permissionValue = $mapPermission->get($perm);

                        $permission = \App\Permission::firstOrCreate([
                            'name' => $module . '-' . $permissionValue,
                            'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                            'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        ]);

                        $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);

                        if (!$user->can($permission->name)) {
                            $user->attachPermission($permission);
                        } else {
                            $this->command->info($key . ': ' . $p . ' ' . $permissionValue . ' already exist');
                        }
                    }
                }
            }
        }

    }

    /**
     * Deletes all the laratrust tables and the users table
     * @return    void
     */
    public function deleteLaratrustTables()
    {
        DB::table('permission_role')->delete();
        DB::table('permission_user')->delete();
        DB::table('role_user')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        DB::table('groups')->delete();

        DB::table('users')->delete();
    }
}
