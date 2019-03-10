<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saledetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('waist_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->decimal('priceUnit',6,2)->unsigned();
            $table->decimal('total',6,2)->unsigned();                        
            $table->integer('status')->unsigned();                        
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
        Schema::dropIfExists('saledetails');
    }
}
