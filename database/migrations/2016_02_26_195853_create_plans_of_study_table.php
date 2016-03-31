<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansOfStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans_of_study', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->references('id')->on('students')->onDelete('cascade')->unsigned();
            $table->integer('program_id')->references('id')->on('programs')->onDelete('cascade')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plans_of_study');
    }
}
