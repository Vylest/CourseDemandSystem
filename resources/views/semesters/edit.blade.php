@extends('layouts.app')

@section('page_title')Edit Semester @endsection
@section('content')
    {!! Form::model($semester, ['method'=>'patch', 'action'=>['SemesterController@update', $semester->id]]) !!}
        @include('semesters._form')
    {!! Form::close() !!}
@endsection