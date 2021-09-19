<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //producto
        Schema::create('product', function (Blueprint $table) {
            $table->increments('productId');

            $table->integer('touristicPlaceId')->unsigned();
            $table->string('productName');
            $table->string('productDescription');
            $table->string('productIcon');
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
        Schema::dropIfExists('product');
    }
}
