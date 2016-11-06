<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_provider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('presentation');
            $table->string('size');
            $table->string('weight');
            $table->string('measure');
            $table->string('material');
            $table->longText('description');
            $table->string('composition');
            $table->string('forms_employment');
            $table->string('taxes');
            $table->string('image_scale');
            $table->text('farms');
            $table->integer('subcategory_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('provider_id')->unsigned();
            $table->timestamps();

            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('provider_id')->references('id')->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_provider');
    }
}
