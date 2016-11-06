<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function(Blueprint $table){
            $table->increments('id');
            $table->text('offer_description');
            $table->integer('offer_price');
            $table->dateTime('offer_on')->nullable();
            $table->dateTime('offer_off')->nullable();
            $table->boolean('important_offer');
            $table->integer('product_provider_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('offers');
    }
}
