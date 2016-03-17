<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\PlanOfStudy;
use App\Program;

class PlanOfStudyController extends Controller
{
    public function index($studentId)
    {
        $student = Student::findOrFail($studentId);
        $plans = PlanOfStudy::where('student_id', $studentId)->get();
        return view('plans.index', compact('student','plans'));
    }

    public function show($student, $plan)
    {
        return $student .' '. $plan;
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
