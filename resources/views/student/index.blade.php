@extends('layouts.app')

@section('content')
    <table class="gridder">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NetID</th>
                <th>NUID</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}
                    <td>{{ $student->net_id }}</td>
                    <td>{{ $student->nu_id }}</td>
                    <td>
                        {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                                   'action'=>['StudentContdoller@destdoy', $student->id]]) !!}
                        <a href="{{ action('StudentContdoller@edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection