<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\Student;
use App\PlanOfStudy;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('edit', ['only' => ['edit','store','create','destroy','update']]);
    }
    
    public function index()
    {
//        $students = Student::all();
//        return view('student.index', compact('students'));

        // check for request parameters
        $input = \Request::all();

        if (!\Request::wantsJson()) {
            return view('student.index');
        }

//        $courses = Course::paginate();
        //$query = Course::select('number', 'title');
        if (isset($input['sorting'])) {
            $orderParam = $input['sorting'];
            $orderBy = key($orderParam);
            $direction = $input['sorting'][key($orderParam)];
        } else {
            $orderBy = 'first_name';
            $direction = 'asc';
        }

        $query = Student::select(['first_name', 'last_name', 'netid', 'nuid', 'status', 'id'])->orderBy($orderBy, $direction);

        if (isset($input['filter'])) {
            $filterParam = $input['filter'];

            foreach ($filterParam as $key => $value) {
                $filterValue = '%'. $value . '%';
                $column = $key;
                $query = $query->where($column, 'like', $filterValue);
            }
        }

        $students = $query->paginate();

        return response()->json($students);
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

    public function update(Requests\StudentUpdateRequest $request, $id)
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
