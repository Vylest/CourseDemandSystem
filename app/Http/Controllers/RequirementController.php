<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DegreeRequirement;
use App\Program;
use App\Course;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($programId)
    {
        // get requirements for program id
        $program = Program::findOrFail($programId);
        $requirements = DegreeRequirement::where(['program_id'=>$program->id])->get();
        $requirementsCourseIds = array_pluck($requirements, 'course_id');
        $courses = Course::all();

        return view('requirements.index', compact('program', 'requirements', 'courses'));
        //dd($requirementsCourseIds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($programId)
    {
        $program = Program::findOrFail($programId);
        $courses = Course::all();
        return view('requirements.create', compact('program', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($program, Request $request)
    {
        //
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
    public function edit($program, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $program, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program, $id)
    {
        //
    }
}
