<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\PlanOfStudy;
use App\Enrollment;
use App\Program;
use App\Semester;

class PlanOfStudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('edit', ['only' => ['edit','store','create','destroy','update']]);
    }
    
    public function index($id)
    {
        return redirect()->route('students.show', $id);
    }

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
            $plan->enrollments()->save(new Enrollment(['course_id'=>$requirement->course->id, 'semester_id'=>$semester, 'degree_requirement_id'=>$requirement->id, 'completed'=>$completed]));
        }

        return redirect()->route('students.show', [$student->id])->with('success', 'The study plan has been successfully added!');
    }

    public function show($studentId, $planId)
    {
        $student = Student::findOrFail($studentId);
        $semesters = Semester::lists('semester', 'id');
        $courses =  Course::lists('title', 'id');
        $plan = PlanOfStudy::findOrFail($planId);

        //dd($plan->enrollments);

        return view('plans.show', compact('student', 'plan', 'semesters', 'courses'));
    }

    public function edit($studentId, $planId)
    {
        $student = Student::findOrFail($studentId);
        $plan = PlanOfStudy::findOrFail($planId);
        
        
    }

    public function update($studentId, $planId, Request $request)
    {
        $student = Student::findOrFail($studentId);
        $plan = PlanOfStudy::findOrFail($planId);
        $plan->update($request->all());
        
        return redirect()->route('students.show', [$student->id])->with('success', 'Plan successfully updated!');
    }

    public function destroy($studentId, $planId)
    {
        $student = Student::findOrFail($studentId);
        $plan = PlanOfStudy::findOrFail($planId);

        $plan->delete();

        return redirect()->route('students.show', $student->id)->with('success', 'Plan successfully deleted');
    }
}
