<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductprice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productprices', function (Blueprint $table){
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('waist_id')->unsigned();
            $table->integer('price_cost')->unsigned();
            $table->integer('price_sale')->unsigned();
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
        Schema::dropIfExists('productprices');
    }
}
