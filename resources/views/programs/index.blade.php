@extends('layouts.app')

@section('page_title')Programs @endsection
@section('content')
    <table class="gridder">
        <thead>
        <tr>
            <th>Program</th>
            @if(Auth::user()->canEdit())
                <th>Operations <a href="{{ action('ProgramController@create') }}" class="btn pull-right"><i class="fa fa-plus"></i> Create a New Program</a></th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($programs as $program)
            <tr>
                <td><a href="{{ action('ProgramController@show', $program->id) }}">{{ $program->name }}</a></td>
                @if(Auth::user()->canEdit())
                    <td>
                        @include('partials._operations', ['model'=>$program, 'controller'=>'ProgramController'])
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection