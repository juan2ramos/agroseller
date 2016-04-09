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
            $table->longText('description');
            $table->string('composition');
            $table->string('forms_employment');
            $table->integer('price');
            $table->string('taxes');
            $table->integer('available_quantity');
            $table->string('image_scale');
            $table->string('location');
            $table->boolean('important_offer');
            $table->integer('offer_price');
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
        Schema::drop('products');
    }
}
