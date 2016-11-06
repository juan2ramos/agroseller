<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company-name');
            $table->string('location');
            $table->string('address');
            $table->string('contact');
            $table->string('contact-phone');
            $table->string('description');
            $table->string('NIT');
            $table->string('url-video');

            $table->string('sales-manager-name');
            $table->string('licence');
            $table->string('dispatch-time');
            $table->string('legal-agent');
            $table->string('logo');
            $table->string('nick-name');
            $table->string('taxpayer');
            $table->string('web-site');

            /* Datos bancarios */
            $table->string('titular-name');
            $table->string('bank-name');
            $table->string('bank-country');
            $table->string('count-number');
            $table->integer('validate');
            $table->integer('user_id')->unsigned();
            $table->integer('agent_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('providers');
    }
}
