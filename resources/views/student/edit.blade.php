@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    {!! Form::model($student, ['method'=>'PATCH','action'=>['StudentController@update',$student->id]]) !!}
        @include('student._form')
    {!! Form::close() !!}
@endsection