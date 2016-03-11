@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    {!! Form::model($course, ['method'=>'patch', 'class'=>'form-inline', 'action'=>['CourseController@update', $course->id]]) !!}
        @include('courses._form')
    {!! Form::close() !!}
@endsection