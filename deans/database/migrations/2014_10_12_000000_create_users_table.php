<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
//            nationality_id
            $table->string('name');
            $table->string('lastname');
            $table->string('patronymic');
            $table->unsignedBigInteger('gender_id');
            $table->string('tel');
            $table->dateTime('birthdate');
            $table->string('registration_address');
            $table->string('residential_address');
            $table->string('iin');
            $table->string('login')->unique();
            $table->timestamp('login_verified_at')->nullable();
            $table->string('password');

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');;

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
