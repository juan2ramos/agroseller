<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_provider_tax', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_provider_id')->unsigned();
            $table->integer('tax_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_provider_id')->references('id')->on('product_provider')->onDelete('cascade');
            $table->foreign('tax_id')->references('id')->on('taxes') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_provider_tax');
    }
}
