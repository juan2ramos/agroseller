<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_provider', function(Blueprint $table){
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->integer('period');
            $table->integer('price');
            $table->timestamps();

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
        Schema::drop('plan_provider');
    }
}
