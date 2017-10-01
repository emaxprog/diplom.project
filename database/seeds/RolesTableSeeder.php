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
        $roleUser = new Role();
        $roleUser->name = 'User';
        $roleUser->description = 'A normal User';
        $roleUser->save();

        $roleModerator = new Role();
        $roleModerator->name = 'Moderator';
        $roleModerator->description = 'A Moderator';
        $roleModerator->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Admin';
        $roleAdmin->description = 'A Admin';
        $roleAdmin->save();
    }
}
