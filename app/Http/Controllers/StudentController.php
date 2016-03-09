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
        return view('student.show', compact('student'));
    }

    public function create() {
        return view('student.create');
    }

    public function store(Requests\StudentRequest $request) {
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->net_id = $request->net_id;
        $student->nu_id = $request->nu_id;
        $student->save();

        return redirect()->route('students.index')->with('message', 'Successfully created student record');
    }

    public function edit($id) {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update($id, Requests\StudentRequest $request) {
        $student = Student::findOrFail($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->net_id = $request->net_id;
        $student->nu_id = $request->nu_id;
        $student->update();

        return redirect()->route('students.show', $student->id)->with('message', 'Successfully updated the student record');

    }

    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('message', 'Student record successfully deleted');
    }

    public function manage() {
        return view('student.manage');
    }
}
