@extends('layouts.app')

@section('page_title')Programs@endsection
@section('content')
    <table class="gridder">
        <thead>
        <tr>
            <th>Program</th>
            <th>Operations <a href="{{ action('ProgramController@create') }}" class="btn pull-right">Create a New Program</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($programs as $program)
            <tr>
                <td><a href="{{ action('ProgramController@show', $program->id) }}">{{ $program->name }}</a></td>
                <td>
                    @include('partials._operations', ['model'=>$program, 'controller'=>'ProgramController'])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection