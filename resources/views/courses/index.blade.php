@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    <table class="gridder">
        <thead>
            <tr>
                <th>Title</th>
                <th>Number</th>
                <th><a class="btn pull-right" href="{{ action('CourseController@create') }}"><i class="fa fa-plus"></i> Create New Course</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>
                        {{ $course->title }}
                    </td>
                    <td>
                        {{ $course->number }}
                    </td>
                    <td>
                        {!! Form::model($course, ['method'=>'delete', 'class' => 'delete-confirm', 'action' => ['CourseController@destroy', $course->id]]) !!}
                            <span class="pull-right">
                                 <a href="{{ action('CourseController@show',  $course->id) }}" class="btn">View</a>
                                 <a href="{{ action('CourseController@edit',  $course->id) }}" class="btn btn-info">Edit</a>
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </span>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection