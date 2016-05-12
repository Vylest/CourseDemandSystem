@extends('layouts.app')

@section('page_title')Students @endsection


@section('content')
    <div ng-controller="TableController" infinite-scroll="scrollService.nextPage()">
        <table class="gridder" ng-table="tableParams" show-filter="true">
            <thead>
                <tr>
                    <th>
                        First Name
                        <i class="fa fa-search"
                            ng-click="showFirstName = !showFirstName"></i>
                        <i class="fa fa-sort"
                            ng-class="{
                            'fa-sort-asc' : tableParams.isSortBy('first_name', 'asc'),
                            'fa-sort-desc' : tableParams.isSortBy('first_name', 'desc')}"
                            ng-click="tableParams.sorting({first_name: tableParams.isSortBy('first_name', 'asc') ? 'desc' : 'asc' })"></i>
                        <input type="text"
                                ng-model="params.filter()['first_name']"
                                ng-show="showFirstName"
                                ng-blur="showFirstName = hideField($event)">
                    </th>
                    <th>
                        Last Name
                        <i class="fa fa-search"
                           ng-click="showLastName = !showLastName"></i>
                        <i class="fa fa-sort"
                           ng-class="{
                            'fa-sort-asc' : tableParams.isSortBy('last_name', 'asc'),
                            'fa-sort-desc' : tableParams.isSortBy('last_name', 'desc')}"
                           ng-click="tableParams.sorting({last_name: tableParams.isSortBy('last_name', 'asc') ? 'desc' : 'asc' })"></i>
                        <input type="text"
                               ng-model="params.filter()['last_name']"
                               ng-show="showLastName"
                               ng-blur="showLastName = hideField($event)">
                    </th>
                    <th>
                        NetID
                        <i class="fa fa-search"
                           ng-click="showNetId = !showNetId"></i>
                        <i class="fa fa-sort"
                           ng-class="{
                            'fa-sort-asc' : tableParams.isSortBy('netid', 'asc'),
                            'fa-sort-desc' : tableParams.isSortBy('netid', 'desc')}"
                           ng-click="tableParams.sorting({netid: tableParams.isSortBy('netid', 'asc') ? 'desc' : 'asc' })"></i>
                        <input type="text"
                               ng-model="params.filter()['netid']"
                               ng-show="showNetId"
                               ng-blur="showNetId = hideField($event)">
                    </th>
                    <th>
                        NUID
                        <i class="fa fa-search"
                           ng-click="showNuId = !showNuId"></i>
                        <i class="fa fa-sort"
                           ng-class="{
                            'fa-sort-asc' : tableParams.isSortBy('nuid', 'asc'),
                            'fa-sort-desc' : tableParams.isSortBy('nuid', 'desc')}"
                           ng-click="tableParams.sorting({nuid: tableParams.isSortBy('nuid', 'asc') ? 'desc' : 'asc' })"></i>
                        <input type="text"
                               ng-model="params.filter()['nuid']"
                               ng-show="showNuId"
                               ng-blur="showNuId = hideField($event)">
                    </th>
                    <th>Status</th>

                    <th>
                        Operations
                        @if(Auth::user()->canEdit())
                            <a class="btn pull-right" href="{{ action('StudentController@create') }}"><i class="fa fa-plus"></i> Add a New Student</a>
                        @endif
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="student in $data">
                    <td data-title="'First Name'" sortable="'first_name'">@{{ student.first_name }}</td>
                    <td data-title="'Last Name'" sortable="'last_name'"><strong>@{{ student.last_name }}</strong></td>
                    <td data-title="'Net ID'" sortable="'netid'">@{{ student.netid }}</td>
                    <td data-title="'NU ID'" sortable="'nuid'">@{{ student.nuid }}</td>
                    <td data-title="'Status'" sortable="''status'">@{{ student.status }}</td>
                    <td>
                        <span class="pull-right span4">
                            <form method="POST" action="@{{ '/students/' + student.id }}" class="delete-confirm ng-pristine ng-valid">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <a href="/students/@{{ student.id }}" class="btn btn-xs"><i class="fa fa-eye"></i> View</a>
                                @if(Auth::user()->canEdit())
                                    <a href="/students/@{{ student.id }}/edit" class="btn btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <button type="submit" class="btn btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                @endif
                            </form>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection