<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->bigIncrements('favoriteId');
            
            $table->integer('userId')->unsigned();
            $table->integer('touristicPlaceId')->unsigned();
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
        Schema::dropIfExists('favorite');
    }
}
