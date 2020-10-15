<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_status_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('study_form_id');
            $table->unsignedBigInteger('payment_form_id');
            $table->unsignedBigInteger('study_lang_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('study_status_id')->references('id')->on('study_statuses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('study_form_id')->references('id')->on('study_forms')->onDelete('cascade');
            $table->foreign('payment_form_id')->references('id')->on('payment_forms')->onDelete('cascade');
            $table->foreign('study_lang_id')->references('id')->on('study_langs')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->integer('course');
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
        Schema::dropIfExists('students');
    }
}
