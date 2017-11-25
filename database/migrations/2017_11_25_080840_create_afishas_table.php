<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfishasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afishas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('caption')->nullable();
            $table->boolean('visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afishas');
    }
}
