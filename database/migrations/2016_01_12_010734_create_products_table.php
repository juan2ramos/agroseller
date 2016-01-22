<?php

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
            $table->string('presentation');
            $table->string('size');
            $table->string('weight');
            $table->string('measure');
            $table->string('material');
            $table->string('description');
            $table->string('composition');
            $table->string('forms-employment');
            $table->string('price');
            $table->string('taxes');
            $table->string('available-quantity');
            $table->string('image-scale');
            $table->string('location');
            $table->string('offer');
            $table->string('offer-price');
            $table->longText('description-use');




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
        //
    }
}
