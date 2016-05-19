<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders',function(Blueprint $table){
            $table->string('name_client');
            $table->string('identification_client');
            $table->string('address_client');
            $table->string('phone_client');

            $table->integer('state_order_id')->unsigned();
            $table->foreign('state_order_id')->references('id')->on('state_orders')->onDelete('cascade');

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
