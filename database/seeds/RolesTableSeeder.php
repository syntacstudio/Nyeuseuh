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

        $operator = new Role();
        $operator->name = 'operator';
        $operator->description = 'Operator of the system';
        $operator->save();

        $role_user = new Role();
        $role_user->name = 'customer';
        $role_user->description = 'Money machine of the system';
        $role_user->save();
    }
}
