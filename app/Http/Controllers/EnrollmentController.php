<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use App\PlanOfStudy;
use App\Enrollment;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $studentId, $planId, $enrollId)
    {
        $student = Student::findOrFail($studentId);
        $plan = PlanOfStudy::findOrFail($planId);
        $enroll = Enrollment::findOrFail($enrollId);
        if(!isset($request->completed)) {
            $complete = 0;
        } else {
            $complete = 1;
        }
        $enroll->update(['credits'=>$request->credits,'completed'=>$complete]);
        return redirect()->route('students.plans.show', [$student->id, $plan->id])->with('success', 'Enrollment updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $studentId, $planId, $enrollId)
    {
        $student = Student::findOrFail($studentId);
        $plan = PlanOfStudy::findOrFail($planId);
        $enroll = Enrollment::findOrFail($enrollId);
        $enroll->delete();

        return redirect()->route('students.plans.show', [$student->id, $plan->id])->with('success', 'Enrollment deleted!');
    }

}
