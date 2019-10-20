<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_operator = Role::where('name', 'operator')->first();
        $role_customer  = Role::where('name', 'customer')->first();

        $owner = new User();
        $owner->name = "Willy Arisky";
        $owner->email = "admin@test.app";
        $owner->password = bcrypt('secret');
        $owner->save();
        $owner->roles()->attach($role_admin);
        
        $operator = new User();
        $operator->name = "Gunaldi Tofik";
        $operator->email = "operator@test.app";
        $operator->password = bcrypt('secret');
        $operator->save();
        $operator->roles()->attach($role_operator);

        $customer = new User();
        $customer->name = "Gal Gadot";
        $customer->email = "customer@test.app";
        $customer->password = bcrypt('secret');
        $customer->save();
        $customer->roles()->attach($role_customer);

    }
}
