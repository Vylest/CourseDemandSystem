@extends('layouts.app')

@section('content')
    {!! Form::open(['action'=>'StudentController@store']) !!}
        @include('student._form')
    {!! Form::close() !!}
@endsection