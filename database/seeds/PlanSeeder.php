<?php

use Illuminate\Database\Seeder;
use App\PlanOfStudy;
use App\Program;
use App\Student;
use App\DegreeRequirement;
use App\Semester;
use App\Enrollment;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        $programs = Program::all();
        $programCount = Program::count()-1;
        $semester = Semester::findOrFail(1);

        foreach ($students as $student) {

            foreach(range(1, rand(1,2)) as $j) {
                $student->plansOfStudy()->save(new PlanOfStudy(['program_id'=>$programs[rand(0, $programCount)]->id, 'graduated' => rand(0,1)]));
            }

            foreach($student->plansOfStudy as $plan) {
                $programRequirements = DegreeRequirement::where('program_id', '=', $plan->program_id)->get();
                foreach($programRequirements as $requirement) {
                    $plan->enrollments()->save(new Enrollment(['course_id'=>$requirement->course_id, 'degree_requirement_id' => $requirement->id, 
                        'completed' => rand(0,1), 'credits' => rand(1,3), 'semester_id' => $semester->id]));
                }
            }
        }
    }
}
