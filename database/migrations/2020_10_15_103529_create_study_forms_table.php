<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_forms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('degree_id');
            $table->unsignedBigInteger('department_type_id');

            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
            $table->tinyInteger('course_count');
            $table->foreign('degree_id')->references('id')->on('degree_types')->onDelete('cascade');
            $table->foreign('department_type_id')->references('id')->on('department_types')->onDelete('cascade');
        });

        DB::table('study_forms')->insert([
            'description_kz'=>'Күндізгі 4 жыл',
            'description_ru'=>'Очное 4 года',
            'description_en'=>'Full 4 year',
            'course_count'=> 4,
            'degree_id'=> 1,
            'department_type_id'=> 1
        ]);

        DB::table('study_forms')->insert([
            'description_kz'=>'Сырттай 3 жыл',
            'description_ru'=>'Заочное 3 года',
            'description_en'=>'Distance 3 year',
            'course_count'=> 3,
            'degree_id'=> 1,
            'department_type_id'=> 2
        ]);

        DB::table('study_forms')->insert([
            'description_kz'=>'Сырттай 2 жыл',
            'description_ru'=>'Заочное 2 года',
            'description_en'=>'Distance 2 year',
            'course_count'=> 2,
            'degree_id'=> 1,
            'department_type_id'=> 2
        ]);

        DB::table('study_forms')->insert([
            'description_kz'=>'Магистр',
            'description_ru'=>'Магистр',
            'description_en'=>'Master',
            'course_count'=> 2,
            'degree_id'=> 2,
            'department_type_id'=> 1
        ]);

        DB::table('study_forms')->insert([
            'description_kz'=>'Магистр (1.5)',
            'description_ru'=>'Магистр (1.5)',
            'description_en'=>'Master (1,5)',
            'course_count'=> 2,
            'degree_id'=> 3,
            'department_type_id'=> 1
        ]);

        DB::table('study_forms')->insert([
            'description_kz'=>'Күндізгі 3 жыл',
            'description_ru'=>'Очное 3 года',
            'description_en'=>'CCO 3 year',
            'course_count'=> 3,
            'degree_id'=> 1,
            'department_type_id'=> 1
        ]);

        DB::table('study_forms')->insert([
            'description_kz'=>'Докторантура күндізгі',
            'description_ru'=>'Докторантура очное',
            'description_en'=>'PhD',
            'course_count'=> 3,
            'degree_id'=> 3,
            'department_type_id'=> 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_forms');
    }
}
