@extends('layouts.app')

@section('page_title')Degree Requirements @endsection
@section('content')
    <h3>{{ $program->name }}</h3>
    <div class="row">
        <div class="span8">
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
    @if ( isset($requirements))
            <h3>Requirements</h3>
            {!! Form::open([
                    'action' => ['RequirementController@store', $program->id]]) !!}
            @include('programs._formRequirements')
            {!! Form::close() !!}
    @endif
@endsection