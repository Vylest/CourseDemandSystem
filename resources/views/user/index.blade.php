@extends('layouts.app')

@section('content')
    <table class="gridder">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>NU ID</th>
                <th>Network ID</th>
                <th>Role</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{ action('UserController@show', [$user->id]) }}">{{ $user->first_name }}</a></td>
                    <td><a href="{{ action('UserController@show', [$user->id]) }}">{{ $user->last_name }}</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection