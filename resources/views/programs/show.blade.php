@extends('layouts.app')

@section('page_title'){{ $program->name }}@endsection
@section('content')
    <div class="row">
        <div class="span6">
            <table class="gridder">
                <thead>
                    <tr>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Type</td>
                    <td>{{ $program->type }}</td>
                </tr>
                <tr>
                    <td>Career</td>
                    <td>{{ $program->career }}</td>
                </tr>
                <tr>
                    <td>Credits Required</td>
                    <td>{{ $program->credits_required }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="span2">
            {!! Form::model($program, ['method'=>'delete', 'class'=>'delete_confirm',
		                               'action'=>['ProgramController@destroy', $program->id]]) !!}
            <a href="{{ action('ProgramController@edit', $program->id) }}" class="btn btn-cta-red">Edit</a>
            {!! Form::submit('Delete', ['class' => 'btn']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <h3>Required Courses</h3>
        <table class="gridder">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                TODO foreach each requirement
            </tbody>
        </table>
    </div>
@endsection