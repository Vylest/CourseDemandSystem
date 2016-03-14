<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Program;

class ProgramController extends Controller
{
    public function index() {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function show($id) {
        $program = Program::findOrFail($id);
        return view('programs.show', compact('program'));
    }

    public function create() {
        return view('programs.create');
    }

    public function store(Requests\ProgramRequest $request) {
        $program = new Program(['name'=>$request->name, 'type'=>$request->type, 'career'=>$request->career, 'credits_required'=>$request->credits_required]);
        $program->save();
        return redirect()->route('programs.index')->with('success', 'Program created!');
    }

    public function edit($id) {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    public function update($id, Requests\ProgramRequest $request) {

    }

    public function destroy($id) {

    }
}
