@extends('layouts.app')

@section('content')
    @include('partials._flash')
    @include('partials._errors')
    <table class="gridder">
        <thead>
           <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Network ID</th>
               <th>University ID</th>
               <th>Operations</th>
           </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->net_id }}</td>
                    <td>{{ $student->nu_id }}</td>
                    <td>
                        {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                                   'action'=>['StudentController@destroy', $student->id]]) !!}
                        <a href="{{ action('StudentController@edit', $student->id) }}" class="btn">Edit</a>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger delete-confirm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection