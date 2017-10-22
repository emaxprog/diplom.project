<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('alias');
            $table->integer('category_id')->unsigned();
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('image_preview_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->unsigned();
            $table->integer('code')->unsigned();
            $table->boolean('is_new')->default(true);
            $table->boolean('is_recommended')->default(false);
            $table->boolean('visibility')->default(true);
            $table->mediumInteger('amount')->unsigned();

            $table->foreign('image_preview_id')->references('id')->on('images')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
