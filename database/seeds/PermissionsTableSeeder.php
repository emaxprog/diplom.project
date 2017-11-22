<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name'=>'view-admin','description'=>'Admin panel right'],
            ['name'=>'view-product','description'=>'The right to create products'],
            ['name'=>'create-product','description'=>'The right to create products'],
            ['name'=>'update-product','description'=>'The right to update products'],
            ['name'=>'delete-product','description'=>'The right to delete products'],
        ]);
    }
}
