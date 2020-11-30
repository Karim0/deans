<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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

            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');

            $table->string('title_short_kz');
            $table->string('title_short_ru');
            $table->string('title_short_en');

            $table->foreign('parent_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('department_type_id')->references('id')->on('department_types')->onDelete('cascade');
            $table->integer('include_staff');
        });

        DB::table('departments')->insert([
            'title_kz'=>'Компьютерлік Инженерия және Ақпараттық Қауіпсіздік',
            'title_ru'=>'Компьютерная Инженерия и Информационная Безопасность',
            'title_en'=>'Computer Engineering  and Information Security',

            'title_short_kz'=>'КИжАҚ',
            'title_short_ru'=>'КИиИБ',
            'title_short_en'=>'CE&IS',
            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

        DB::table('departments')->insert([
            'title_kz'=>'Информационные системы',
            'title_ru'=>'Ақпараттык жүйелер',
            'title_en'=>'Information System ',

            'title_short_kz'=>'АЖ',
            'title_short_ru'=>'ИС',
            'title_short_en'=>'IS',
            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

        DB::table('departments')->insert([
            'title_kz'=>'Математикалық және компьютерлік модельдеу',
            'title_ru'=>'Математическое и компьютерное моделирование',
            'title_en'=>'Mathematical and Computer Modeling',

            'title_short_kz'=>'МжКМ',
            'title_short_ru'=>'МиКМ',
            'title_short_en'=>'MCM',

            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

        DB::table('departments')->insert([
            'title_kz'=>'Медиакомуникация және Қазақстан тарихы',
            'title_ru'=>'Медиакомуникации и История Казахстана',
            'title_en'=>'Media communications and History of Kazakhstan',

            'title_short_kz'=>'МжҚТ',
            'title_short_ru'=>'МиИК',
            'title_short_en'=>'MKH',

            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

        DB::table('departments')->insert([
            'title_kz'=>'Экономика және Бизнес',
            'title_ru'=>'Экономики и Бизнеса',
            'title_en'=>'Economics and Business',

            'title_short_kz'=>'ЭжБ',
            'title_short_ru'=>'ЭиБ',
            'title_short_en'=>'EB',

            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

        DB::table('departments')->insert([
            'title_kz'=>'Тілдер кафедрасы',
            'title_ru'=>'Языков',
            'title_en'=>'Department of Languages',

            'title_short_kz'=>'ТК',
            'title_short_ru'=>'КЯз',
            'title_short_en'=>'LANGUAGES',

            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

        DB::table('departments')->insert([
            'title_kz'=>'Радиотехника, электроника және телекоммуникациялар',
            'title_ru'=>'Радиотехника, электроника и телекоммуникации',
            'title_en'=>'Radiotechnics electronics and telecommunication',

            'title_short_kz'=>'РЭТ',
            'title_short_ru'=>'РЭТ',
            'title_short_en'=>'RET',

            'parent_id'=>NULL,
            'department_type_id'=>2,
            'include_staff'=>1,
        ]);

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
