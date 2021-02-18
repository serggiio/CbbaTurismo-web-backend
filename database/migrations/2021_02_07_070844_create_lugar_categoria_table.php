<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placeCategory', function (Blueprint $table) {
            $table->increments('placeCategoryId');

            $table->integer('touristicPlaceId')->unsigned();
            $table->integer('categoryId')->unsigned();
            $table->timestamps();

            $table->foreign('touristicPlaceId')->references('touristicPlaceId')->on('touristicPlace')->onDelete('cascade');
            $table->foreign('categoryId')->references('categoryId')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugar_categoria');
    }
}
