<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
        });

        DB::table('department_types')->insert([
            'description_kz'=>'Факультет',
            'description_ru'=>'Факультет',
            'description_en'=>'Faculty'
        ]);

        DB::table('department_types')->insert([
            'description_kz'=>'Кафедра',
            'description_ru'=>'Кафедра',
            'description_en'=>'Cafedra'
        ]);

        DB::table('department_types')->insert([
            'description_kz'=>'Департамент',
            'description_ru'=>'Департамент',
            'description_en'=>'Department'
        ]);

        DB::table('department_types')->insert([
            'description_kz'=>'Отдел',
            'description_ru'=>'Отдел',
            'description_en'=>'Division'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_types');
    }
}
