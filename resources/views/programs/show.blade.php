@extends('layouts.app')

@section('page_title')@endsection
@section('content')
    <h3>{{ $program->name }}</h3>
    <div class="row">
        <div class="span8">
            <table class="gridder">
                <thead>
                    <tr>
                        <th>Details</th>
                        <th><span class="pull-right">@include('partials._operations', ['model'=>$program,'controller'=>'ProgramController'])
                                <a href="{{ action('RequirementController@index', $program->id) }}" class="btn">Change Degree Requirements</a></span></th>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requirements as $requirement)
                        <tr>
                            <td>{{ $courses[$requirement->course_id-1]->number }} - {{ $courses[$requirement->course_id-1]->title }}</td>
                            <td>{{ $requirement->type ? 'Elective' : 'Required'  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection