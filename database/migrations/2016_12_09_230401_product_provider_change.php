<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductProviderChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_providers',function($table){
            $table->string('isValidate')->default(1)->change();
            $table->string('isActive')->default(1)->change();
        });
        Schema::table('products',function($table){
            $table->string('active')->default(1)->change();
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
