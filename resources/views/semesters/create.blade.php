@extends('layouts.app')

@section('page_title')Semester Editor @endsection
@section('content')
    {!! Form::open(['action'=>'SemesterController@store']) !!}
        @include('semesters._form')
    {!! Form::close() !!}
@endsection