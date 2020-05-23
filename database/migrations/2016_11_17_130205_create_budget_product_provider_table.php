<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetProductProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_product_provider', function(Blueprint $table){
            $table->increments('id');
            $table->integer('product_provider_id')->unsigned();
            $table->integer('budget_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('product_provider_id')->references('id')->on('product_providers');
            $table->foreign('budget_id')->references('id')->on('budgets');
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
