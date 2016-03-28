<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Program;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate();

        if (!\Request::wantsJson()) {
            return view('courses.index');
        }

        $returnData = ['data'=>$courses];
        return response()->json($courses);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $programs = Program::where('id', $course->id)->get();
        return view('courses.show', compact('course', 'programs'));
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

    public function getCourses()
    {
        $courses = Course::all();

        $returnData = ['data'=>$courses];

//        $courseList = [];
//        foreach($courses as $course => $id) {
//            $data = (object)[
//                'id'=>$id,
//                'number' => $course['number'],
//                'title' => $course['title']
//            ];
//            array_push($courseList, $data);
//        }

        return response()->json($returnData);
    }
}
