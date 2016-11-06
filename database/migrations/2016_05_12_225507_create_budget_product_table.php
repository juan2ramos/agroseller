<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_provider_budget', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quantity');
            $table->integer('product_provider_id')->unsigned();
            $table->integer('budget_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_provider_id')->references('id')->on('product_provider')->onDelete('cascade');
            $table->foreign('budget_id')->references('id')->on('budgets') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_provider_budget');
    }
}
