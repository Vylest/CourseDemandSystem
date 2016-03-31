@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    {!! Form::open(['action'=>'CourseController@store', 'class'=>'form-inline']) !!}
        @include('courses._form')
    {!! Form::close() !!}
@endsection