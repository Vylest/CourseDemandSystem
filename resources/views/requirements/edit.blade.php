@extends('layouts.app')

@section('content')
    {!! Form::model($requirement, ['method'=>'patch', 'action'=>['RequirementController@update', $programId, $requirement->id]]) !!}
        @include('requirements._form')
    {!! Form::close() !!}
@endsection