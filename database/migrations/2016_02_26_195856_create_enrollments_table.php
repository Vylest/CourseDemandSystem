<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credits');
            $table->boolean('completed');
            $table->integer('plan_of_study_id')->unsigned();
            $table->integer('degree_requirement_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('enrollments', function(Blueprint $table){
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('degree_requirement_id')->references('id')->on('degree_requirements')->onDelete('cascade');
            $table->foreign('plan_of_study_id')->references('id')->on('plans_of_study')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('enrollments');
    }
}
