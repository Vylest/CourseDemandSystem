<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Program;
use App\Course;
use App\DegreeRequirement;
use App\PlanOfStudy;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('edit', ['only' => ['edit','store','create','destroy','update']]);
    }

    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        $courses = Course::lists('title', 'id');
        $requirements = DegreeRequirement::where(['program_id'=>$program->id])->orderBy('type', 'asc')->get();
        return view('programs.show', compact('program', 'requirements', 'courses'));
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
        // delete cascades
        PlanOfStudy::where('program_id', '=', $program->id)->delete();
        DegreeRequirement::where('program_id', '=', $program->id)->delete();
        
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program successfully deleted!');
    }

    public function info($id)
    {
        $program = Program::findOrFail($id);

        return view('programs._info', compact('program'));
    }
}
