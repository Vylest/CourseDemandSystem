@extends('layouts.app')

@section('page_title')View Courses @endsection
@section('content')
    <table class="gridder">
        <thead>
            <tr>
                <th>Number</th>
                <th>Title</th>
                <th><a class="btn pull-right" href="{{ action('CourseController@create') }}"><i class="fa fa-plus"></i> Create New Course</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>
                        {{ $course->number }}
                    </td>
                    <td>
                        {{ $course->title }}
                    </td>
                    <td>
                        <span class="pull-right">
                            <a href="{{ action('CourseController@show',  $course->id) }}" class="btn"><i class="fa fa-eye"></i> View</a>
                            @include('partials._operations', ['model'=>$course,'controller'=>'CourseController'])
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection