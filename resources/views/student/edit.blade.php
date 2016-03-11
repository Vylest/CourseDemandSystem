@extends('layouts.app')

@section('content')
    {!! Form::model($student, ['method'=>'PATCH','action'=>['StudentController@update',$student->id]]) !!}
        @include('student._form')
    {!! Form::close() !!}
@endsection