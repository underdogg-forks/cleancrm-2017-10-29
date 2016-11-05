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
        $this->truncateLaratrustTables();

        $config = config('laratrust_seeder.role_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));
        $faker = Faker\Factory::create();

        foreach ($config as $key => $modules) {
            // Create a new role
            $role = \App\Role::create([
                'name' => $key,
                'display_name' => ucfirst($key),
                'description' => ucfirst($key),
            ]);

            $this->command->info('Creating Role ' . strtoupper($key));

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

                    $this->command->info('Creating Permission to ' . $permissionValue . ' for ' . $module);

                    if (!$role->hasPermission($permission->name)) {
                        $role->attachPermission($permission);
                    } else {
                        $this->command->info($key . ': ' . $p . ' ' . $permissionValue . ' already exist');
                    }
                }
            }

            // Create default user for each role
            $user = \App\User::create([
                'name' => ucfirst($key),
                'email' => $key . '@app.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ]);
            $user->attachRole($role);

            // create total of 100 users
            factory(\App\User::class, 96)->create()->each(function ($u) use ($role, $faker) {
                $u->attachRole($role);
                \App\Profile::create([
                    'user_id' => $u->id,
                    'phone' => $faker->regexify('[0-9]{12}'),
                ]);
            });
        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();
        \App\User::truncate();
        \App\Role::truncate();
        \App\Permission::truncate();
        \App\Profile::truncate();
        \App\UserToken::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
