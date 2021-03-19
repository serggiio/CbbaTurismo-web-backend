<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('videos', function (Blueprint $table) {
            $table->increments('videoId');

            $table->integer('galleryId')->unsigned();
            $table->string('videoName');
            $table->string('videoPath');
            $table->string('mainVideo')->default('false');
            $table->timestamps();

            $table->foreign('galleryId')->references('galleryId')->on('gallery')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
