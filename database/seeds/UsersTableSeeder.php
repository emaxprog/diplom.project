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
        $roleAdmin = Role::where('name', 'Admin')->first();
        $admin = new User();
        $admin->username = 'Admin';
        $admin->email = 'admin@web.ru';
        $admin->password = bcrypt('ghjuhfvvbcn96');
        $admin->save();
        $admin->roles()->attach($roleAdmin);
    }
}
