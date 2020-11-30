<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_kz');
        });

        DB::table('genders')->insert(['title_ru'=>'Мужской', 'title_en'=>'Male', 'title_kz'=>'Ер']);
        DB::table('genders')->insert(['title_ru'=>'Женский', 'title_en'=>'Female', 'title_kz'=>'Әйел']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genders');
    }
}
