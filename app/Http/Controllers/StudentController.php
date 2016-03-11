<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function show($id) {
        $student = Student::findOrFail($id);
        return view('student.show', comapct('student'));
    }

    public function create() {
        return view('student.create');
    }

    public function store($request) {
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->netid = $request->netid;
        $student->nuid = $request->nuid;
        $student->save();

        return redirect()->route('student.index')->with('message', 'Successfully created student record');
    }

    public function edit($id) {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update($id, $request) {
        $student = Student::findOrFail($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->netid = $request->netid;
        $student->nuid = $request->nuid;
        $student->update();

    }

    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('message', 'Student record successfully deleted');
    }

    public function manage() {
        return view('student.manage');
    }
}
