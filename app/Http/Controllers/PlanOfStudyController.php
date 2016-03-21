<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\PlanOfStudy;
use App\Enrollment;
use App\Program;
use App\Semester;

class PlanOfStudyController extends Controller
{


    public function create($studentId)
    {
        $student = Student::findOrFail($studentId);
        $programs = Program::lists('name', 'id');
        $semesters = Semester::lists('semester', 'id');
        return view('plans.create', compact('student', 'programs', 'semesters'));
    }

    public function store($studentId, Request $request)
    {
        $student = Student::findOrFail($studentId);
        $program = Program::findOrFail($request->program_id);
        $semester = Semester::findOrFail($request->semester_id)->value('id');
        $plan = $student->plansOfStudy()->save(new PlanOfStudy($request->all()));

        $completed = false;

        foreach ($program->degreeRequirements as $requirement) {
            $plan->enrollments()->save(new Enrollment(['course_id'=>$requirement->course->id, 'semester_id'=>$semester, 'completed'=>$completed]));
        }

        return redirect()->route('students.show', [$student->id])->with('success', 'The study plan has been successfully added!');
    }

    public function show($studentId, $planId)
    {

    }

    public function edit($studentId, $planId)
    {

    }

    public function update($studentId, $planId)
    {

    }

    public function destroy($studentId, $planId)
    {

    }
}
