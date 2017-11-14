<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleModerator = Role::where('name', 'moderator')->first();
        foreach (Permission::all() as $perm) {
            $roleAdmin->permissions()->attach($perm);
            $roleModerator->permissions()->attach($perm);
        }
        $admin = new User();
        $admin->username = 'Admin';
        $admin->email = 'admin@web.ru';
        $admin->password = bcrypt('ghjuhfvvbcn96');
        $admin->save();
        $admin->roles()->attach($roleAdmin);

        $moderator = new User();
        $moderator->username = 'Moderator';
        $moderator->email = 'moderator@web.ru';
        $moderator->password = bcrypt('ghjuhfvvbcn96');
        $moderator->save();
        $moderator->roles()->attach($roleModerator);

    }
}
