<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tags del lugar turistico
        Schema::create('placeTag', function (Blueprint $table) {
            $table->increments('placeTagId');
            
            $table->integer('touristicPlaceId')->unsigned();
            $table->integer('tagId')->unsigned();
            $table->timestamps();

            $table->foreign('touristicPlaceId')->references('touristicPlaceId')->on('touristicPlace')->onDelete('cascade');
            $table->foreign('tagId')->references('tagId')->on('tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placeTag');
    }
}
