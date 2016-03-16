<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Requests\CourseRequest $request)
    {
        $course = new Course(['title' => $request->title,'number' => $request->number]);
        $course->save();
        return redirect()->route('courses.index')->with('success', 'The course has been successfully created!');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update($id, Requests\CourseRequest $request)
    {
        $course = Course::findOrFail($id);
        $course->title = $request->title;
        $course->number = $request->number;
        $course->save();
        return redirect()->route('courses.index')->with('success', 'The course has been successfully updated!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'The course has been successfully deleted!');
    }
}
