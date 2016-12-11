<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing', function(Blueprint $table){
            $table->increments('id');
            $table->string('high');
            $table->string('width');
            $table->string('long');
            $table->integer('quantity');
            $table->timestamps();

            $table->integer('product_provider_id')->unsigned();
            $table->foreign('product_provider_id')->references('id')->on('product_providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
