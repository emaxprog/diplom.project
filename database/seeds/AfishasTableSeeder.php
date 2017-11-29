<?php

use Illuminate\Database\Seeder;
use App\Models\Backend\Afisha;
use Illuminate\Support\Facades\DB;

class AfishasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('afishas')->insert([
            ['name' => 'Афиша в шапке на главной странице', 'title' => null, 'description' => null, 'caption' => null, 'visibility' => true],
            ['name' => 'Афиша в секции отзывов на главной странице', 'title' => null, 'description' => null, 'caption' => null, 'visibility' => true],
            ['name' => 'Афиша на странице каталога', 'title' => null, 'description' => null, 'caption' => null, 'visibility' => true],
            ['name' => 'Афиша на странице товара', 'title' => null, 'description' => null, 'caption' => null, 'visibility' => true],
            ['name' => 'Афиша на странице корзины', 'title' => null, 'description' => null, 'caption' => null, 'visibility' => true],
            ['name' => 'Афиша в сайдбаре', 'title' => null, 'description' => null, 'caption' => null, 'visibility' => true],
        ]);
    }
}
