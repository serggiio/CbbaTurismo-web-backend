<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarTuristicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //lugar turistico
        Schema::create('touristicPlace', function (Blueprint $table) {
            $table->increments('touristicPlaceId');

            $table->integer('provinceId')->unsigned();
            $table->integer('userId')->nullable()->unsigned();
            $table->integer('placeStatusId')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->text('history')->nullable();
            $table->string('placeName');
            $table->string('mainImage');
            $table->string('mainVideo')->nullable();
            $table->text('streets')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('businessHours')->nullable();
            $table->string('type');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->timestamps();

            $table->foreign('provinceId')->references('provinceId')->on('province')->onDelete('cascade');
            $table->foreign('placeStatusId')->references('statusId')->on('status')->onDelete('cascade');
            $table->foreign('userId')->references('userId')->on('usertable')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugar_turistico');
    }
}
