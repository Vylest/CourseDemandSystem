@extends('layouts.app')

@section('page_title')Students @endsection

@section('content')
    <table class="gridder">
        <thead>
            <tr>
                <th>Name</th>
                <th>NetID</th>
                <th>NUID</th>
                <th>Status</th>
                @if(Auth::user()->is_admin)
                    <th>Operations</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td><a href="{{ action('StudentController@show', $student->id) }}">{{ $student->first_name }} {{ $student->last_name }}</a></td>
                    <td>{{ $student->netid }}</td>
                    <td>{{ $student->nuid }}</td>
                    <td>{{ $student->status }}</td>
                    @if(Auth::user()->is_admin)
                        <td>
                            {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
                                       'action'=>['StudentController@destroy', $student->id]]) !!}
                                <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-cta-red"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" class="btn"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection