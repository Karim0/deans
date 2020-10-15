<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
