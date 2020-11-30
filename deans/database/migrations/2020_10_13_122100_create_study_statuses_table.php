<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudyStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
            $table->timestamps();
        });


        DB::table('study_statuses')->insert(['description_kz' => 'Bilim alýshy',
            'description_ru' => 'Обучающийся',
            'description_en' => 'STUDENT']);

        DB::table('study_statuses')->insert(['description_kz' => 'Talapker',
            'description_ru' => 'Абитуриент',
            'description_en' => 'ENROLLEE']);

        DB::table('study_statuses')->insert(['description_kz' => 'Oqýdan shyǵaryldy',
            'description_ru' => 'Отчислен',
            'description_en' => 'EXPELLED']);

        DB::table('study_statuses')->insert(['description_kz' => 'Bitirýshi',
            'description_ru' => 'Выпускник',
            'description_en' => 'GRADUATE']);

        DB::table('study_statuses')->insert(['description_kz' => 'Akademıalyq demalys',
            'description_ru' => 'Академический отпуск',
            'description_en' => 'ACADEMIC_LEAVE']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_statuses');
    }
}
