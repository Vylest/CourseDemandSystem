@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    {!! Form::open(['action'=>'StudentController@store']) !!}
        @include('student._form')
    {!! Form::close() !!}
@endsection