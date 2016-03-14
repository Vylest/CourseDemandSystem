<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\PlanOfStudy;
use App\Program;

class PlanOfStudyController extends Controller
{
    public function index($student) {
        // get all plans of study for the student id
        return Student::findOrFail($student);
    }

    public function show($student, $plan) {
        return $student .' '. $plan;
    }

    public function create() {

    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
