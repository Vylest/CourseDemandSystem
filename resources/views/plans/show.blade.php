@extends('layouts.app')

@section('page_title')View Study Plan @endsection

@section('content')
    <div class="row">
    <div class="span4">
        <table class="gridder">
            <thead>
            <tr>
                <th>Student Information
                    <a class= "btn btn-cta-red pull-right" href="{{ action('StudentController@show', $student->id) }}">
                        <i class="fa fa-edit"></i> Edit Student</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <td><strong>Net ID:</strong> {{ $student->netid }}</td>
            </tr>
            <tr>
                <td><strong>University ID:</strong> {{ $student->nuid }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="span8">
        <table class="gridder">
            <thead>
            <tr>
                <th>Program Information
                    <a class="btn btn-cta-red pull-right" href="{{ action('ProgramController@show', $plan->program->id) }}">
                        <i class="fa fa-edit"></i> Edit Program</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $plan->program->name }}</td>
            </tr>
            <tr>
                <td>{{ $plan->program->type }} {{ $plan->program->career }}</td>
            </tr>
            <tr>
                <td>{{ $plan->program->credits_required }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="span12">
            <table class="gridder">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Credits</th>
                    <th>Completed</th>
                    <th>Operations
                        <a class="btn pull-right" href="{{ action('PlanOfStudyController@destroy', [$student->id, $plan->id]) }}">
                            <i class="fa fa-trash"></i> Delete Program</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($plan->enrollments as $enrollment)
                    <tr>
                        {!! Form::model($enrollment, ['method'=>'PATCH', 'class'=>'form form-inline',
                                                      'action'=>['EnrollmentController@update', $student->id, $plan->id, $enrollment->id]]) !!}
                        <td>{{ $enrollment->course->number }}</td>
                        <td>{{ $enrollment->course->title }}</td>
                        <td>{!! Form::select('credits', [0=>0,1=>1,2=>2,3=>3]) !!}</td>
                        <td>{!! Form::checkbox('completed') !!}</td>
                        <td>
                            <div class="row">
                                <div class="span1">
                            {!! Form::submit('Save',['class'=>'btn']) !!}
                            {!! Form::close() !!}
                                </div>
                                <div class="span2">
                            {!! Form::model($enrollment, ['method'=>'DELETE', 'class'=>'form form-inline delete-confirm',
                                                          'action'=>['EnrollmentController@destroy', $student->id, $plan->id, $enrollment->id]]) !!}
                            <button type="submit" class="btn"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection