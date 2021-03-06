@extends('layouts.app')

@section('content')
    @include('partials._flash')
    @include('partials._errors')
    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
    <hr>
    {!! Form::model($user, ['method'=>'PATCH','action'=>['UserController@update',$user->id]]) !!}
        @include('user._formAdmin')
    {!! Form::close() !!}
@endsection