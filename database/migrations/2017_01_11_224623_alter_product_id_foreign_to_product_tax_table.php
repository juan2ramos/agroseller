<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductIdForeignToProductTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_tax', function(Blueprint $table){
            $table->dropForeign('product_tax_product_id_foreign');
            $table->dropColumn('product_id');
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
