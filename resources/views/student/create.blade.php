@extends('layouts.app')

@section('page_title')Add New Student @endsection

@section('content')
    {!! Form::open(['action'=>'StudentController@store']) !!}
        @include('student._form')
    {!! Form::close() !!}
@endsection