@extends('layouts.app')

@section('page_title')Admin Panel @endsection
@section('content')
<div class="offset2 span4">
    <div class="accordion" id="adminPanel">
        <div class="accordion-group">
            <h5 class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel1">
                    Manage Semesters
                </a>
            </h5>
            <div id="panel1" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <ul class="standard">
                        <li><a href="{{ action('SemesterController@create') }}">Add a new Semester</a></li>
                        <li><a href="{{ action('SemesterController@index') }}">Edit Semesters</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <h5 class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel3">Manage Courses</a>
            </h5>
            <div id="panel3" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <ul class="standard">
                        <li><a href="{{ action('CourseController@create') }}">Add a new Course</a></li>
                        <li><a href="{{ action('CourseController@index') }}">Edit Courses</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="span4">
    <div class="accordion-group">
        <h5 class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel4">Manage Programs</a>
        </h5>
        <div id="panel4" class="accordion-body collapse in">
            <div class="accordion-inner">
                <ul class="standard">
                    <li><a href="{{ action('ProgramController@create') }}">Add a new Program</a></li>
                    <li><a href="{{ action('ProgramController@index') }}">Edit Programs</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-group">
        <h5 class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel5">Manage Students</a>
        </h5>
        <div id="panel5" class="accordion-body collapse in">
            <div class="accordion-inner">
                <ul class="standard">
                    <li><a href="{{ action('StudentController@create') }}">Add a new Student</a></li>
                    <li><a href="{{ action('StudentController@index') }}">Edit Students</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="span8 offset2">
    @if(Auth::user()->is_admin)
        <div class="accordion-group">
            <h5 class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel2">
                    Manage Users
                </a>
            </h5>
            <div id="panel2" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <ul class="standard">
                        <li><a href="{{ action('UserController@create') }}">Add a new User</a></li>
                        <li><a href="{{ action('UserController@index') }}">Edit Users</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection