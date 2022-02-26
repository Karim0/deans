<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAcademicDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_degrees', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sort_order');
            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->timestamps();
        });

        DB::table('academic_degrees')->insert([
            'sort_order'=>1,
            'title_kz'=>'Жоқ',
            'title_ru'=>'Не имеет степени',
            'title_en'=>'None']);

        DB::table('academic_degrees')->insert([
            'sort_order'=>2,
            'title_kz'=>'Магистр',
            'title_ru'=>'Магистр',
            'title_en'=>'Master']);

        DB::table('academic_degrees')->insert([
            'sort_order'=>3,
            'title_kz'=>'Ғылымдар кандидаты',
            'title_ru'=>'Кандидат наук',
            'title_en'=>'Кандидат наук']);

        DB::table('academic_degrees')->insert([
            'sort_order'=>4,
            'title_kz'=>'Ғылымдар докторы',
            'title_ru'=>'Доктор наук',
            'title_en'=>'Доктор наук']);

        DB::table('academic_degrees')->insert([
            'sort_order'=>4,
            'title_kz'=>'Доктор PhD',
            'title_ru'=>'Доктор PhD',
            'title_en'=>'Доктор PhD']);

        DB::table('academic_degrees')->insert([
            'sort_order'=>4,
            'title_kz'=>'Доктор по профилю',
            'title_ru'=>'Доктор по профилю',
            'title_en'=>'Доктор по профилю']);

        DB::table('academic_degrees')->insert([
            'sort_order'=>4,
            'title_kz'=>'Доктор философии PhD',
            'title_ru'=>'Доктор философии PhD',
            'title_en'=>'Доктор философии PhD']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_degrees');
    }
}
