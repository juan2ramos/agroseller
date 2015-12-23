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
            $table->string('photo', 60);
            $table->integer('validate');
            //$table->enum('role', ['superAdministrator','administrator','provider','client']);
            $table->integer('role_id');
            $table->rememberToken();
            $table->timestamps();
        });
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
