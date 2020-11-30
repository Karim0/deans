<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('profile_img')->nullable();

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');;

            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(['id'=>1,
            'name'=>'Admin',
            'lastname'=>'Admin',
            'patronymic'=>'Admin',
            'gender_id'=>1,
            'tel'=>'87077777777',
            'birthdate'=>'0001-01-01 00:00:00',
            'registration_address'=>'Admin',
            'residential_address'=>'Admin',
            'iin'=>'0000000000000',
            'login'=>'Admin',
            'password'=>'$2y$10$ANldyBRGW3JTZNg7fX4VGe3PKncPGe3WJQcxnwLXrwExtMSCzRfMy']);
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
