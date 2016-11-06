<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){
            $table->increments('id');
            $table->text('description');
            $table->string('name_client');
            $table->string('identification_client');
            $table->string('address_client');
            $table->string('phone_client');
            $table->integer('user_id')->unsigned();

            $table->string('zp_buy_id');
            $table->string('zp_buy_token');
            $table->string('zp_state');
            $table->string('zp_pay_form');
            $table->string('zp_pay_value');
            $table->string('zp_pay_credit');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
