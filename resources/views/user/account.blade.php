@extends('layouts.app')

@section('content')
    @include('partials._flash')
    @include('partials._errors')
    <h3>Account Management</h3>
    <hr>
    <ul class="standard">
        <li><a href="{{ action('UserController@editAccount', $user->id) }}">Edit Account Information</a></li>
        <li><a href="{{ action('UserController@changeAccountPassword', $user->id) }}">Change Password</a></li>
    </ul>
@endsection