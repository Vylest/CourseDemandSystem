@extends('layouts.app')

@section('page_title')Programs @endsection
@section('content')
    <h3>{{ $program->name }}</h3>
    <div class="row">
        <div class="span8">
            <table class="gridder">
                <thead>
                    <tr>
                        <th>Details</th>
                        <th>
                            @if(Auth::user()->canEdit())
                                <span class="pull-right">@include('partials._operations', ['model'=>$program,'controller'=>'ProgramController'])</span>
                            @endif
                        </th>
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
    @if(Auth::user()->canEdit())
        {!! Form::open([
                    'action' => ['RequirementController@store', $program->id]]) !!}
        @include('programs._formRequirements')
        {!! Form::close() !!}
    @endif
    @if ( isset($requirements))
            <h3>Requirements</h3>
            <table class="gridder">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Type</th>
                    @if(Auth::user()->canEdit())
                        <th>
                            Operations
                            <a class="btn pull-right" id="showRequirementForm"><i class="fa fa-plus"></i> Add a Course</a>
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($requirements as $requirement)
                    <tr>
                        <td>{{ $requirement->course->number }} - {{ $requirement->course->title}}</td>
                        <td>{{ $requirement->type ? 'Elective' : 'Required'  }}</td>
                        @if(Auth::user()->canEdit())
                            <td>{!! Form::model($requirement, ['method'=>'delete', 'class'=>'delete-confirm operations',
                                           'action'=>['RequirementController@destroy', $program, $requirement->id]]) !!}
                                <a href="{{ action('RequirementController@edit', [$program, $requirement->id]) }}" class="btn btn-cta-red">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn']) !!}
                                {!! Form::close() !!}
                            @if(Auth::user()->is_admin)
                                    {!! Form::model($requirement, ['method'=>'delete', 'class'=>'delete-cascade operations',
                                               'action'=>['RequirementController@destroyCascade', $program, $requirement->id]]) !!}
                                        <button type="submit" class="btn btn-warning">☢ Delete & Cascade</button>
                                    {!! Form::close() !!}
                            @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endif
@endsection