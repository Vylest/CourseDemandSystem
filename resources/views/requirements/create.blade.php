@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'post', 'action'=>['RequirementController@store', $program->id]]) !!}
        @include('requirements._form')
    {!! Form::close() !!}
@endsection