<?php

namespace App\Http\Controllers;

use App\DegreeRequirement;
use App\Enrollment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Program;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('edit', ['only' => ['edit','store','create','destroy','update']]);
    }

    public function index()
    {
        // check for request parameters
        $input = \Request::all();

        if (!\Request::wantsJson()) {
            return view('courses.index');
        }

        if (isset($input['sorting'])) {
            $orderParam = $input['sorting'];
            $orderBy = key($orderParam);
            $direction = $input['sorting'][key($orderParam)];
        } else {
            $orderBy = 'title';
            $direction = 'asc';
        }

        $query = Course::select(['id', 'number', 'title'])->orderBy($orderBy, $direction);

        if (isset($input['filter'])) {
            $filterParam = $input['filter'];

            foreach ($filterParam as $key => $value) {
                $filterValue = '%'. $value . '%';
                $column = $key;
                $query = $query->where($column, 'like', $filterValue);
            }
        }

        $courses = $query->paginate();

        return response()->json($courses);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        $programs = DegreeRequirement::select('programs.id', 'programs.name', 'programs.type')
                    ->where('course_id', $course->id)
                    ->join('programs', 'degree_requirements.program_id', '=', 'programs.id')->get();

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
        // deletion cascades
        DegreeRequirement::where('course_id', '=', $course->id)->delete();
        Enrollment::where('course_id', '=', $course->id)->delete();

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'The course has been successfully deleted!');
    }

    public function getCourses()
    {
        $courses = Course::all();

        foreach ($courses as &$course) {
            $course->value = $course->id;
        }

        return response()->json($this->transformCollection($courses), 200);
    }

    private function transformCollection($courses)
    {
        $courseArray = $courses->toArray();
        return array_map([$this, 'transform'], $courseArray);
    }

    private function transform($course)
    {
        return ['id' => $course['id'],
                'number' => $course['number'],
                'title'  => $course['title']];
    }
}
