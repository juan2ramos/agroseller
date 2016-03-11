<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baling'); // Presentacion
            $table->string('size'); // Tamaño
            $table->string('weight'); // Peso
            $table->string('metering'); //Medida
            $table->string('material'); //Material
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('features');
    }
}
