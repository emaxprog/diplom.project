<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_value', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->string('value', 50);
            $table->primary(['product_id', 'attribute_id']);

            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('attribute_id')->references('id')->on('product_attributes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        DB::connection()->getPdo()->exec('DROP VIEW IF EXISTS `params`');
        DB::connection()->getPdo()->exec('
        CREATE VIEW `params` AS 
        SELECT `pa`.`id` AS `id`,`pa`.`name` AS `name`,`pa`.`unit` AS `unit`,`pav`.`product_id` AS `product_id`,`pav`.`value` AS `value` 
        FROM (`product_attributes` `pa` 
        LEFT JOIN `product_attribute_value` `pav` ON((`pa`.`id` = `pav`.`attribute_id`)))'
        );
        DB::connection()->getPdo()->exec('DROP PROCEDURE IF EXISTS `get_params`');
        DB::connection()->getPdo()->exec('
        CREATE PROCEDURE `get_params`(IN `id` INT)
        BEGIN
            SELECT * FROM `params` WHERE `product_id` = `id`;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP PROCEDURE IF EXISTS `get_params`');
        DB::connection()->getPdo()->exec('DROP VIEW IF EXISTS `params`');
        Schema::drop('product_attribute_value');
    }
}
