<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            ['name'=>'Заказ принят'],
            ['name'=>'Заказ передан на исполнение'],
            ['name'=>'Заказ доставляется'],
            ['name'=>'Заказ подготовлен к выдаче'],
            ['name'=>'Заказ выдан']
        ]);
    }
}
