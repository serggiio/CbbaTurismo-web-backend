<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentary', function (Blueprint $table) {
            $table->increments('commentaryId');

            $table->integer('userId')->unsigned();
            $table->integer('touristicPlaceId')->unsigned();
            $table->string('commentaryDesc');
            $table->integer('reports');
            $table->string('commentaryStatus')->default('Active');
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
        Schema::dropIfExists('comentarios');
    }
}
