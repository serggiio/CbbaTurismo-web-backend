<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userTable', function (Blueprint $table) {
            $table->increments('userId');

            $table->integer('statusId')->nullable()->unsigned();
            $table->integer('typeId')->nullable()->unsigned();
            $table->string('name');
            $table->string('lastName');
            $table->string('phoneNumber', 140)->nullable();
            $table->string('email', 140)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('verificationCode')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('typeId')->references('increments')->on('userType')->onDelete('cascade');
            $table->foreign('statusId')->references('statusId')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tables');
    }
}
