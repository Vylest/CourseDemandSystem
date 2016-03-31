@extends('layouts.app')

@section('page_title')Degree Requirements@endsection
@section('content')
    <h3>{{ $program->name }}</h3>
    <div class="row">
        <div class="span60">
            <table class="gridder">
                <thead>
                <tr>
                    <th>Details</th>
                    <th></th>
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
    </div>
    @if ( !is_null($requirements))
        <div class="row">
            <h3>Requirements</h3>
            <table class="gridder">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Type</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($requirements as $requirement)
                    <tr>
                        <td>{{ $courses[$requirement->course_id-1]->number }} - {{ $courses[$requirement->course_id-1]->title }}</td>
                        <td>{{ $requirement->type ? 'Elective' : 'Required'  }}</td>
                        <td>{!! Form::model($requirement, ['method'=>'delete', 'class'=>'delete-confirm operations',
		                               'action'=>['RequirementController@destroy', $program, $requirement->id]]) !!}
                            <a href="{{ action('RequirementController@edit', [$program, $requirement->id]) }}" class="btn btn-cta-red">Edit</a>
                            {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection