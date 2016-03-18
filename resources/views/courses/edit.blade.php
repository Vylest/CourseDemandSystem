@extends('layouts.app')

@section('content')
    {!! Form::model($course, ['method'=>'patch', 'class'=>'form-inline', 'action'=>['CourseController@update', $course->id]]) !!}
        @include('courses._form')
    {!! Form::close() !!}
@endsection