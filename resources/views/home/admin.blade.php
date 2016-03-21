@extends('layouts.app')

@section('page_title')Admin Panel @endsection
@section('content')
<div class="offset2 span8">
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
        <div class="accordion-group">
            <h5 class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel3">Manage Courses</a>
            </h5>
            <div id="panel3" class="accordion-body collapse in">
                <div class="accordion-inner">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection