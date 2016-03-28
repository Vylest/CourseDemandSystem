<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SemesterRequest;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        return view('semesters.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterRequest $request)
    {
        $semester = Semester::create($request->all());
        $semester->save();
        return redirect()->route('semesters.index')->with('success', 'The semester has been successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        return view('semesters.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SemesterRequest $request, $id)
    {
        $semester = Semester::findOrFail($id);
        if (!isset($request->completed)) {
            $semester->update(['semester'=>$request->semester,'completed'=>0]);
        } else {
            $semester->update($request->all());
        }

        return redirect()->route('semesters.index')->with('success', 'The semester has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();
        return redirect()->route('semesters.index')->with('success', 'The semester has been successfully deleted!');
    }
}
