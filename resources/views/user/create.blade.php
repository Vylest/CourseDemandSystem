@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials._flash')
        @include('partials._errors')
        <div class="row">
            <h3>Create User</h3>
            {!! Form::open(['action'=>'UserController@store','class'=>'']) !!}
            @include('user._formAdmin')
            {!! Form::close() !!}
        </div>

    </div>
@endsection
