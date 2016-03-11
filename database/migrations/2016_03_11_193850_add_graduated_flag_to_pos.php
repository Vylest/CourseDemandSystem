<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGraduatedFlagToPos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans_of_study', function (Blueprint $table) {
            $table->boolean('graduated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans_of_study', function (Blueprint $table) {
            $table->dropColumn('graduated');
        });
    }
}
