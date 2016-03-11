@extends('layouts.app')

@section('content')
    @include('partials._flash')
    @include('partials._errors')
    <div class="panel">
        <h3>User Administration</h3>
        <div class="panel-body">
            <table class="gridder">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>NU ID</th>
                    <th>Role</th>
                    <th>Operation
                    <span class="pull-right"><a class="btn btn-default" href="{{ action('UserController@create') }}">Create New User</a></span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{{ action('UserController@edit', [$user->id]) }}">{{ $user->first_name }}</a></td>
                        <td><a href="{{ action('UserController@edit', [$user->id]) }}">{{ $user->last_name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nu_id }}</td>
                        <td>{{ $roles[$user->account_type] }}</td>
                        <td>
                            {!! Form::model($user, [
                                'method' => 'DELETE',
                                'class' => 'delete-confirm',
                                'action' => [
                                'UserController@destroy',
                                $user->id
                                ]
                                ]) !!}
                            <a href="{{ action('UserController@edit', [$user->id]) }}"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection