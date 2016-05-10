<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->unsigned(); // required / elective: 0/1/2
            $table->integer('program_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::table('degree_requirements', function(Blueprint $table) {
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('degree_requirements');
    }
}
