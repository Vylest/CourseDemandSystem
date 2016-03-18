@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    <h3>{{ $course->number }} - {{ $course->title }}</h3>
    <hr>
    <table class="gridder">
        <thead>
        <tr>
            <th>Program</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($programs as $program)
            <tr>
                <td><a href="{{ action('ProgramController@show', $program->id) }}">{{ $program->name }}</a></td>
                <td>{{ $program->type }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection