<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //accion
        Schema::create('action', function (Blueprint $table) {
            $table->increments('actionId');

            $table->integer('userId')->unsigned();
            $table->string('actionName');
            $table->string('table')->nullable();
            $table->text('oldData')->nullable();
            $table->text('newData')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->foreign('userId')->references('userId')->on('userTable')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action');
    }
}
