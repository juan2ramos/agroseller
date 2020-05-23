<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductProviderIdForeignToProductProviderTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_provider_tax', function(Blueprint $table){
            $table->dropForeign('product_tax_product_provider_id_foreign');
            $table->dropColumn('product_provider_id');
        });

        Schema::table('product_provider_tax', function(Blueprint $table){
            $table->integer('product_provider_id')->unsigned();
            $table->foreign('product_provider_id')->references('id')->on('product_providers');
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
