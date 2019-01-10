<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeyForeignToSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('sales', function (Blueprint $table) {
        $table->foreign('product_id')->references('id')->on('products');
        $table->foreign('waist_id')->references('id')->on('waists');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('sales_waist_id_foreign');
            $table->dropForeign('sales_product_id_foreign');
        });
    }
}
