@extends('layouts.app')

@section('content')
    @include('partials._errors')
    @include('partials._flash')
    <h3>{{ $course->number }} - {{ $course->title }}</h3>
    <hr>
    <table class="gridder">
        TODO: programs that have this class here, and whether it is elective or required
    </table>
@endsection