<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'User','description'=>'A normal User'],
            ['name'=>'Moderator','description'=>'A Moderator'],
            ['name'=>'Admin','description'=>'A Admin'],
        ]);
    }
}
