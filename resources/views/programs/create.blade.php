@extends('layouts.app')

@section('page_title')Create New Program @endsection
@section('content')
    {!! Form::open(['action'=>'ProgramController@store']) !!}
        @include('programs._form')
    {!! Form::close() !!}
@endsection