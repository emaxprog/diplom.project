<?php

use Illuminate\Database\Seeder;
use App\Models\Delivery;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delivery = new Delivery();
        $delivery->name = 'Express';
        $delivery->price = '200';
        $delivery->save();
    }
}
