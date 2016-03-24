@extends('layouts.app')

@section('page_title')Add a Plan of Study @endsection

@section('content')
    {!! Form::open(['action'=>['PlanOfStudyController@store', $student->id]]) !!}
    <div class="row-fluid">
        @include('plans._form', ['semester'=>$semesters])
    {!! Form::close() !!}
    </div>
@endsection