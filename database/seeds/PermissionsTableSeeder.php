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
            ['name'=>'Admin view','description'=>'Admin panel right'],
            ['name'=>'Create product','description'=>'The right to create products'],
            ['name'=>'Update product','description'=>'The right to update products'],
            ['name'=>'Delete product','description'=>'The right to delete products'],
        ]);
    }
}
