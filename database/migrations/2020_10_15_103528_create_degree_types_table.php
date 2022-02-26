<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDegreeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');
        });
        DB::table('degree_types')->insert([
            'title_kz'=>'Бакалавр',
            'title_ru'=>'Бакалавр',
            'title_en'=>'Bachelor',
        ]);

        DB::table('degree_types')->insert([
            'title_kz'=>'Магистр ғылыми-педагогикалық бағыт бойынша',
            'title_ru'=>'Магистрант по научно-педагогическому направлению',
            'title_en'=>'Master of scientific and pedagogical direction',
        ]);

        DB::table('degree_types')->insert([
            'title_kz'=>'Бейіндік бағыт бойынша магистр',
            'title_ru'=>'Магистрант по профильному направлению',
            'title_en'=>'Master of the core area',
        ]);

        DB::table('degree_types')->insert([
            'title_kz'=>'PhD докторы',
            'title_ru'=>'Докторант PhD',
            'title_en'=>'Doctor PhD',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degree_types');
    }
}
