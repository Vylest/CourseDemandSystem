@extends('layouts.app')

@section('page_title')Add a Plan of Study @endsection

@section('content')
    {!! Form::open(['action'=>['PlanOfStudyController@store', $student->id]]) !!}
        @include('plans._form')
    {!! Form::close() !!}
@endsection