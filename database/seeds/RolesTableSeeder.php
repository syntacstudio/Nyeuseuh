<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create role admin
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'The god of the sytem';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'The entity has limited access to the system';
        $role_user->save();
    }
}
