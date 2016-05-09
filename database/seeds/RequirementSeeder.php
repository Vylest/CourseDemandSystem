<?php

use Illuminate\Database\Seeder;

use App\Program;
use App\Course;
use App\DegreeRequirement;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degree_requirements')->truncate();

        $programs = Program::all();
        $programCount = Program::count();

        $courses = Course::all();
        $courseCount = Course::count();

        for($i=0; $i < $programCount; $i++) {

            foreach(range(1,20) as $index) {
                    DegreeRequirement::create([
                    'type'=>rand(0,1),
                    'program_id'=>$programs[$i]->id,
                    'course_id'=>$courses[rand(0, $courseCount-1)]->id
                ]);
            }


        }

    }
}
