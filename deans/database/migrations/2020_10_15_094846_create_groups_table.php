<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->date('hire_date');

            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('departments')->onDelete('cascade');
        });

        DB::table('groups')->insert([
            'title_kz'=>'CSSE-1811R',
            'title_ru'=>'CSSE-1811R',
            'title_en'=>'CSSE-1811R',
            'hire_date'=>'2018-09-01',
            'dep_id'=>2
        ]);

        DB::table('groups')->insert([
            'title_kz'=>'CSSE-1810R',
            'title_ru'=>'CSSE-1810R',
            'title_en'=>'CSSE-1810R',
            'hire_date'=>'2018-09-01',
            'dep_id'=>2
        ]);

        DB::table('groups')->insert([
            'title_kz'=>'CSSE-1809R',
            'title_ru'=>'CSSE-1809R',
            'title_en'=>'CSSE-1809R',
            'hire_date'=>'2018-09-01',
            'dep_id'=>2
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
