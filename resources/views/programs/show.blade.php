@extends('layouts.app')

@section('page_title')@endsection
@section('content')
    <h3>{{ $program->name }}</h3>
    <div class="row">
        <div class="span6">
            <table class="gridder">
                <thead>
                    <tr>
                        <th>Details</th>
                        <th><span class="pull-right">@include('partials._operations', ['model'=>$program,'controller'=>'ProgramController'])</span></th>
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
    @if ( !is_null($program->requirements))
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
                    @foreach ($program->requirements as $requirement)
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection