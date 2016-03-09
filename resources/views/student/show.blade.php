@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')

    <h3>{{ $student->first_name }} {{ $student->last_name }}</h3>
    <hr>
    <ul class="standard">
        <li><strong>Network ID:</strong>{{ $student->net_id }}</li>
        <li><strong>University of Nebraska ID:</strong> {{ $student->nu_id }}</li>
    </ul>
    {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                               'action'=>['StudentController@destroy', $student->id]]) !!}
        <a href="{{ action('StudentController@edit', $student->id) }}" class="btn">Edit</a>
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection