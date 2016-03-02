@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials._flash')
        @include('partials._errors')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Add New User</h1>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['action'=>'UserController@store']) !!}
                        @include('user._formAdmin')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
