<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStudentOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_order_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
        });

        DB::table('student_order_statuses')->insert(['description_kz'=>'В процессе',
            'description_ru'=>'В процессе',
            'description_en'=>'In process']);


        DB::table('student_order_statuses')->insert(['description_kz'=>'Готово',
            'description_ru'=>'Готово',
            'description_en'=>'Done']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_order_statuses');
    }
}
