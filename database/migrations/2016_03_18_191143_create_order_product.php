<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function(Blueprint $table){
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('state');
            $table->integer('value');
            $table->integer('order_id')->unsigned();
            $table->integer('product_provider_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_provider_id')->references('id')->on('product_provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
