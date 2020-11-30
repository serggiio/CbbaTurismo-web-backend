<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->increments('rateId');
            
            $table->integer('userId')->unsigned();
            $table->integer('touristicPlaceId')->unsigned();
            $table->integer('puntuacion');
            $table->timestamps();

            $table->foreign('userId')->references('userId')->on('usertable')->onDelete('cascade');
            $table->foreign('touristicPlaceId')->references('touristicPlaceId')->on('touristicPlace')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate');
    }
}
