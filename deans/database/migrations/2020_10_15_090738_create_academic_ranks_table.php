<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAcademicRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_ranks', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sort_order');
            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->timestamps();
        });

        DB::table('academic_ranks')->insert([
            'sort_order'=>1,
            'title_kz'=>'Жоқ',
            'title_ru'=>'Не имеет',
            'title_en'=>'None']);

        DB::table('academic_ranks')->insert([
            'sort_order'=>2,
            'title_kz'=>'Доцент',
            'title_ru'=>'Доцент',
            'title_en'=>'Доцент']);

        DB::table('academic_ranks')->insert([
            'sort_order'=>3,
            'title_kz'=>'Ассоциированный профессор',
            'title_ru'=>'Ассоциированный профессор',
            'title_en'=>'Ассоциированный профессор']);

        DB::table('academic_ranks')->insert([
            'sort_order'=>4,
            'title_kz'=>'Профессор',
            'title_ru'=>'Профессор',
            'title_en'=>'Профессор']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_ranks');
    }
}
