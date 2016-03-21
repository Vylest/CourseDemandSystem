<?php

use Illuminate\Database\Seeder;

use App\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create(['semester'=>'Fall 2016', 'completed'=>true]);
        Semester::create(['semester'=>'Summer 2016', 'completed'=>false]);
        Semester::create(['semester'=>'Spring 2017', 'completed'=>false]);
    }
}
