<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudentOrderCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_order_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
        });

        DB::table('student_order_categories')->insert(['description_kz'=>'Справку об успеваемости (на русском и английском языках)',
            'description_ru'=>'Справку об успеваемости (на русском и английском языках)',
            'description_en'=>'Справку об успеваемости (на русском и английском языках)']);

        DB::table('student_order_categories')->insert(['description_kz'=>'Справку об обучении (на русском и английском языках)',
            'description_ru'=>'Справку об обучении (на русском и английском языках)',
            'description_en'=>'Справку об обучении (на русском и английском языках)']);

        DB::table('student_order_categories')->insert(['description_kz'=>'Справку в органы ФМС об обучении иностранного гражданина',
            'description_ru'=>'Справку в органы ФМС об обучении иностранного гражданина',
            'description_en'=>'Справку в органы ФМС об обучении иностранного гражданина']);

        DB::table('student_order_categories')->insert(['description_kz'=>'Справку об уровне владения иностранным языком',
            'description_ru'=>'Справку об уровне владения иностранным языком',
            'description_en'=>'Справку об уровне владения иностранным языком']);

        DB::table('student_order_categories')->insert(['description_kz'=>'Академическую справку',
            'description_ru'=>'Академическую справку',
            'description_en'=>'Академическую справку']);

        DB::table('student_order_categories')->insert(['description_kz'=>'Справку об уровне владения иностранным языком',
            'description_ru'=>'Справку об уровне владения иностранным языком',
            'description_en'=>'Справку об уровне владения иностранным языком']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_order_categories');
    }
}
