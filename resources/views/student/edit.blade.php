@extends('layouts.app')

@section('page_title')Update Student @endsection

@section('content')
    {!! Form::model($student, ['method'=>'PATCH','action'=>['StudentController@update',$student->id]]) !!}
        @include('student._form')
    {!! Form::close() !!}
@endsection