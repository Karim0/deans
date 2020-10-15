<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('english_level_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('academic_degree_id');
            $table->unsignedBigInteger('payment_form_id');
            $table->unsignedBigInteger('academic_rank_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('english_level_id')->references('id')->on('english_levels')->onDelete('cascade');
            $table->foreign('academic_degree_id')->references('id')->on('academic_degrees')->onDelete('cascade');
            $table->foreign('academic_rank_id')->references('id')->on('academic_ranks')->onDelete('cascade');
            $table->boolean('is_foreign');
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
        Schema::dropIfExists('staff');
    }
}
