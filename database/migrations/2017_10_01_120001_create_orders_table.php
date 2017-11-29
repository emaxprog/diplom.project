<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('delivery_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->default(1);
            $table->string('comment', 255)->nullable()->default(null);
            $table->timestamp('created_at');
            $table->foreign('address_id')->references('id')->on('addresses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('delivery_id')->references('id')->on('deliveries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('order_status')
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
        Schema::drop('orders');
    }
}
