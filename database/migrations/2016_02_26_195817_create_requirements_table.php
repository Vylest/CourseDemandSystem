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
            $table->integer('program_id')->references('id')->on('programs')->unsigned();
            $table->integer('class_id')->references('id')->on('classes')->unsigned();
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
        Schema::drop('requirements');
    }
}
