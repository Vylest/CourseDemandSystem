@extends('layouts.app')

@section('page_title')Students @endsection

@section('content')
    <table class="gridder">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NetID</th>
                <th>NUID</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}
                    <td>{{ $student->netid }}</td>
                    <td>{{ $student->nuid }}</td>
                    <td>{{ $student->status }}</td>
                    <td>
                        {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                                   'action'=>['StudentController@destroy', $student->id]]) !!}
                            <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-cta-red">Edit</a>
                            {!! Form::submit('Delete', ['class' => 'btn']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection