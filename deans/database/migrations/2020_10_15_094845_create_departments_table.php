<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('parent_id')->nullable(true);
            $table->unsignedBigInteger('department_type_id');

            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en');

            $table->string('title_short_kk');
            $table->string('title_short_ru');
            $table->string('title_short_en');

            $table->foreign('parent_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('department_type_id')->references('id')->on('department_types')->onDelete('cascade');
            $table->integer('include_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
