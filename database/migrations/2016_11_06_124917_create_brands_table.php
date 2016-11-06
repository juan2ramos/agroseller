<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('description');
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
        Schema::drop('brands');
    }
}
