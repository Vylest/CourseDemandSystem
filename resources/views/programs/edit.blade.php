@extends('layouts.app')

@section('page_title')Edit {{ $program->name }} @endsection
@section('content')
    {!! Form::model($program, ['method'=>'PATCH','action'=>['ProgramController@store', $program->id]]) !!}
        @include('programs._form')
    {!! Form::close() !!}
@endsection