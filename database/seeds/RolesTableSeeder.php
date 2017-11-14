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
            ['name'=>'user','description'=>'A normal User'],
            ['name'=>'moderator','description'=>'A Moderator'],
            ['name'=>'admin','description'=>'A Admin'],
        ]);
    }
}
