@extends('layouts.app')

@section('page_title'){{ $student->name }} ({{ $student->netid }}, {{ $student->nuid }}) @endsection

@section('content')
    {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                               'action'=>['StudentController@destroy', $student->id]]) !!}
        <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-cta-red">Edit</a>
        {!! Form::submit('Delete', ['class' => 'btn']) !!}
    {!! Form::close() !!}
@endsection