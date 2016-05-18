<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('offers',function(Blueprint $table){
           $table->text('offer_description');
           $table->integer('offer_price');
           $table->dateTime('offer_on')->nullable();
           $table->dateTime('offer_off')->nullable();
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
