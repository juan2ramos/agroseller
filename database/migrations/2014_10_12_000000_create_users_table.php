<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('identification');
            $table->string('name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('mobile_phone');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('photo', 250);
            $table->integer('role_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles') ;        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
