<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('waist_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->decimal('priceUnit',6,2)->unsigned();
            $table->decimal('total',6,2)->unsigned();
            $table->boolean('status')->unsigned()->default('0');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            //$table->primary(['id']);

            //$table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
