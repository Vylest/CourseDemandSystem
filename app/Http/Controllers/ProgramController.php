<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Program;
use App\DegreeRequirement;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        $requirements = DegreeRequirement::where(['program_id'=>$program->id])->orderBy('type', 'asc')->get();


        return view('programs.show', compact('program', 'requirements'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Requests\ProgramRequest $request)
    {
        $program = new Program(['name'=>$request->name, 'type'=>$request->type, 'career'=>$request->career, 'credits_required'=>$request->credits_required]);
        $program->save();
        return redirect()->route('programs.index')->with('success', 'Program created!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    public function update($id, Requests\ProgramRequest $request)
    {
        $program = Program::findOrFail($id);
        $program->update($request->all());
        return redirect()->route('programs.index')->with('success', 'Program successfully updated!');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program successfully deleted!');
    }
}
