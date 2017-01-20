<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CityProductProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_product_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('city_id')->unsigned();
            $table->integer('product_provider_id')->unsigned();


            $table->foreign('product_provider_id')->references('id')->on('product_providers')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities') ;


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('city_product_providers');
    }
}
