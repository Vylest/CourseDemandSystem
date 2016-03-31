@extends('layouts.app')

@section('page_title')View Courses @endsection
@section('content')
    <div ng-controller="TableController" infinite-scroll="scrollService.nextPage()">
    <table ng-table="tableParams" show-filter="true" class="gridder">
        <thead>
            <tr>
                <th>
                    Number
                    <i class="fa fa-search"
                       ng-click="showNumber = !showNumber"></i>
                    <i class="fa fa-sort"
                       ng-class="{
                            'fa-sort-asc': tableParams.isSortBy('number', 'asc'),
                            'fa-sort-desc': tableParams.isSortBy('number', 'desc')}"
                       ng-click="tableParams.sorting({number: tableParams.isSortBy('number', 'asc') ? 'desc' : 'asc'})"></i>
                    <input type="text"
                           ng-model="params.filter()['number']"
                           ng-show="showNumber"
                           ng-blur="showNumber = hideField($event)"
                           placeholder="Start typing to filter...">
                </th>
                <th>
                    Title
                    <i class="fa fa-search"
                       ng-click="showTitle = !showTitle"></i>
                    <i class="fa fa-sort"
                       ng-class="{
                            'fa-sort-asc': tableParams.isSortBy('title', 'asc'),
                            'fa-sort-desc': tableParams.isSortBy('title', 'desc')}"
                       ng-click="tableParams.sorting({title: tableParams.isSortBy('title', 'asc') ? 'desc' : 'asc'})"></i>
                    <input type="text"
                           ng-model="params.filter()['title']"
                           ng-show="showTitle"
                           ng-blur="showTitle = hideField($event)"
                           placeholder="Start typing to filter...">
                </th>
                <th><a class="btn pull-right" href="{{ action('CourseController@create') }}"><i class="fa fa-plus"></i> Create New Course</a></th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="course in $data">
                <td data-title="'Number'" sortable="'number'">@{{ course.number }}</td>
                <td data-title="'Title'" sortable="'title'">@{{ course.title }}</td>
                <td>
                    <span class="pull-right">
                        <form method="POST" action="@{{ '/courses/' + course.id }}" class="delete-confirm ng-pristine ng-valid">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <a href="courses/@{{ course.id }}" class="btn"><i class="fa fa-eye"></i> View</a>
                            <a href="courses/@{{ course.id }}/edit" class="btn"><i class="fa fa-edit"></i> Edit</a>
                            <button type="submit" class="btn"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </span>
                </td>
            </tr>

        </tbody>
    </table>
    </div>
@endsection