@extends('layouts.app')

@section('page_title')Semester Admin Panel @endsection
@section('content')
    <table class="gridder">
        <thead>
        <tr>
            <th>Semester</th>
            <th>Completed</th>
            <th>Operations <a class="btn pull-right" href="{{ action('SemesterController@create') }}"><i class="fa fa-plus"></i> Add Semester</a></th>
        </tr>
        </thead>
        <tbody>
            @foreach($semesters as $semester)
                <tr>
                    <td>
                        {!! Form::model($semester, ['method'=>'patch', 'class'=>'form-inline', 'action'=>['SemesterController@update', $semester->id]]) !!}
                        {!! Form::text('semester') !!}
                    </td>
                    <td>
                        {!! Form::checkbox('completed') !!}
                    </td>
                    <td>
                        <span class="inline">
                        {!! Form::submit('Save', ['class'=>'btn btn-cta-red']) !!}
                        {!! Form::close() !!}
                        {!! Form::model($semester, ['method'=>'delete', 'class'=>'delete-confirm form-inline', 'action'=>['SemesterController@destroy', $semester->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn']) !!}
                        {!! Form::close() !!}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection