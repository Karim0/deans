<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEnglishLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_levels', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sort_order');
            $table->string('name');
            $table->string('description_kz');
            $table->string('description_ru');
            $table->string('description_en');
            $table->timestamps();
        });
        DB::table('english_levels')->insert([
            'sort_order' => 1,
            'name'=>'None',
            'description_kz'=>'None',
            'description_ru'=>'None',
            'description_en'=>'None'
        ]);

        DB::table('english_levels')->insert([
            'sort_order' => 2,
            'name'=>'A1',
            'description_kz'=>'A1',
            'description_ru'=>'A1',
            'description_en'=>'A1'
        ]);


        DB::table('english_levels')->insert([
            'sort_order' => 3,
            'name'=>'A2',
            'description_kz'=>'A2',
            'description_ru'=>'A2',
            'description_en'=>'A2'
        ]);

        DB::table('english_levels')->insert([
            'sort_order' => 4,
            'name'=>'B1',
            'description_kz'=>'B1',
            'description_ru'=>'B1',
            'description_en'=>'B1'
        ]);

        DB::table('english_levels')->insert([
            'sort_order' => 4,
            'name'=>'B2',
            'description_kz'=>'B2',
            'description_ru'=>'B2',
            'description_en'=>'B2'
        ]);

        DB::table('english_levels')->insert([
            'sort_order' => 5,
            'name'=>'C1',
            'description_kz'=>'C1',
            'description_ru'=>'C1',
            'description_en'=>'C1'
        ]);

        DB::table('english_levels')->insert([
            'sort_order' => 6,
            'name'=>'C2',
            'description_kz'=>'C2',
            'description_ru'=>'C2',
            'description_en'=>'C2'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_levels');
    }
}
