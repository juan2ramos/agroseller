<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_provider_file', function(Blueprint $table){
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->integer('product_provider_id')->unsigned();
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files');
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
        Schema::drop('product_provider_file');
    }
}
