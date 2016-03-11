@extends('layouts.app')

@section('content')
    <h3>{{ $student->first_name }} {{ $student->last_name }} | {{ $student->netid }} | {{ $student->nuid }}</h3>
    <hr>
    {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                               'action'=>['StudentController@destroy', $student->id]]) !!}
        <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-cta-red">Edit</a>
        {!! Form::submit('Delete', ['class' => 'btn']) !!}
    {!! Form::close() !!}
@endsection