<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFilesTable extends Migration
{
    /**
     * Run the migrations.
     *<!-- id, product_id, ruta, name, extension -->
     * @return void
     */
    public function up()
    {
        Schema::create('productFiles', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('extension');
            $table->string('url_file');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productFiles');
    }
}
