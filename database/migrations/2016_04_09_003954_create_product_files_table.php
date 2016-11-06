<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_provider_files', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('extension');
            $table->string('url_file');
            $table->integer('product_provider_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_provider_id')->references('id')->on('product_provider')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_provider_files');
    }
}
