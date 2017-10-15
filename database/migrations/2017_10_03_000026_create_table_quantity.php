<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuantity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantities', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('waist_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->primary(['product_id','waist_id']);

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
        Schema::dropIfExists('quantities');
        
    }
}
