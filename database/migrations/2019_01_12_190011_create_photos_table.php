<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('album_id')->unsigned();
          $table->string('image');
          $table->string('imageSmall');
          $table->string('imageAdmin');
          $table->string('description');
          $table->foreign('album_id')->references('id')->on('albums')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('photos');
    }



}
