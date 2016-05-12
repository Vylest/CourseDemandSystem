<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DegreeRequirement;
use App\Program;
use App\Course;
use App\Enrollment;
use Carbon\Carbon;

class RequirementController extends Controller
{

    public function __construct()
    {
        $this->middleware('edit', ['only' => ['edit','store','create','destroy','update']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($programId)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($programId)
    {
        $program = Program::findOrFail($programId);
        $courses = Course::lists('title', 'id');
        return view('requirements.create', compact('program', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($programId, Request $request)
    {
        //dd($request->all());

        $program = Program::findOrFail($programId);
        //$requirement = new DegreeRequirement($request->all());

        if (sizeof($request->newCourseId) > 0) {
            foreach ($request->newCourseType as $key => $newCourseType) {
                if ($request->newCourseId[$key] == "" or $newCourseType == "") {
                    return redirect()->route('programs.show', $program->id)->withErrors('Something went wrong... Please try again!');
                } else {
                    $requirement = new DegreeRequirement([
                        'program_id' => $program->id, 'course_id' => $request->newCourseId[$key], 'type' => $newCourseType
                    ]);
                    $program->degreeRequirements()->save($requirement);
                    $program->updated_at = Carbon::now();
                    $program->save();
                }
            }
        }
        return redirect()->route('programs.show', $program->id)->with('success', 'The program requirements have been updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($program, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($program, $reqId)
    {
        $requirement = DegreeRequirement::findOrFail($reqId);
        $programId = Program::where('id', $program)->value('id');
        $courses = Course::lists('title', 'id');

        return view('requirements.edit', compact('requirement', 'courses', 'programId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $programId, $reqId)
    {
        $program = Program::findOrFail($programId);
        $program->updated_at = Carbon::now();
        $program->save();
        $requirement = DegreeRequirement::findOrFail($reqId);
        $requirement->update($request->all());
        return redirect()->route('programs.show', $program)->with('success', 'The requirement has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program, $reqId)
    {
        $requirement = DegreeRequirement::findOrFail($reqId);

        $requirement->delete();
        return redirect()->route('programs.show', $program)->with('success', 'The requirement has been deleted!');
    }


    public function destroyCascade($program, $reqId)
    {
        $requirement = DegreeRequirement::findOrFail($reqId);

        // delete all enrollment models that use this degree req
        Enrollment::where('degree_requirement_id', '=', $requirement->id)->delete();

        $requirement->delete();
        return redirect()->route('programs.show', $program)->with('success', 'The requirement has been deleted, and so have all enrollments associated');
    }
}
