<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfishaImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afisha_image', function (Blueprint $table) {
            $table->integer('afisha_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->primary(['afisha_id', 'image_id']);
            $table->foreign('afisha_id')->references('id')->on('afishas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afisha_image');
    }
}
