<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('galleryId');

            $table->integer('touristicPlaceId')->unsigned();
            $table->string('galleryName');
            $table->string('galleryPath');
            $table->timestamps();

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
        Schema::dropIfExists('galeria');
    }
}
