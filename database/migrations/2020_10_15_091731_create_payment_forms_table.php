<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePaymentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_forms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
        });


        DB::table('payment_forms')->insert([
            'description_kz'=>'Ақылы',
            'description_ru'=>'Платная',
            'description_en'=>'Paid'
        ]);

        DB::table('payment_forms')->insert([
            'description_kz'=>'Тегін',
            'description_ru'=>'Гос/заказ',
            'description_en'=>'Free'
        ]);

        DB::table('payment_forms')->insert([
            'description_kz'=>'Білім алушылармен алмасу аясында',
            'description_ru'=>'В рамках обмена обучающимися',
            'description_en'=>'Within the bounds of students exchange'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_forms');
    }
}
