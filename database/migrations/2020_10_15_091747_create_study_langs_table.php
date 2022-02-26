<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudyLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_langs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');
        });

        DB::table('study_langs')->insert([
            'title_kz'=>'Английский язык',
            'title_ru'=>'Английский язык',
            'title_en'=>'Английский язык'
        ]);

        DB::table('study_langs')->insert([
            'title_kz'=>'Русский язык',
            'title_ru'=>'Русский язык',
            'title_en'=>'Русский язык'
        ]);

        DB::table('study_langs')->insert([
            'title_kz'=>'Казахский язык',
            'title_ru'=>'Казахский язык',
            'title_en'=>'Казахский язык'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_langs');
    }
}
