<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Requests\StudentRequest $request)
    {
        $student = new Student($request->all());
        $student->save();

        return redirect()->route('students.index')->with('success', 'Successfully created student record!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Requests\StudentRequest $request, $id)
    {

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Successfully updated student!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student record successfully deleted!');
    }

    public function manage()
    {
        return view('student.manage');
    }
}
