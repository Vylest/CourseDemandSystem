@extends('layouts.app')

@section('content')
    @include('partials._flash')
    @include('partials._errors')
    <table class="gridder">
        <thead>
            <tr>First Name</tr>
            <tr>Last Name</tr>
            <tr>Network ID</tr>
            <tr>University ID</tr>
            <tr>Operations</tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>{{ $student->first_name }}</tr>
                <tr>{{ $student->last_name }}
                <tr>{{ $student->net_id }}</tr>
                <tr>{{ $student->nu_id }}</tr>
                <tr>
                    {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                               'action'=>['StudentController@destroy', $student->id]]) !!}
                    <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection