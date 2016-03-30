<table class="gridder">
    <thead>
        <tr>
            <th>Course</th>
            <th>Type</th>
            <th>
                Operations
                <a class="btn pull-right" href="{{ action('RequirementController@create', [$program]) }}">Add a Course</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($requirements as $requirement)
            <tr>
            <td>{{ $requirement->course->number }} - {{ $requirement->course->title}}</td>
            <td>{{ $requirement->type ? 'Elective' : 'Required'  }}</td>
            <td>{!! Form::model($requirement, ['method'=>'delete', 'class'=>'delete-confirm operations',
		                               'action'=>['RequirementController@destroy', $program, $requirement->id]]) !!}
                <a href="{{ action('RequirementController@edit', [$program, $requirement->id]) }}" class="btn btn-cta-red">Edit</a>
                {!! Form::submit('Delete', ['class' => 'btn']) !!}
                {!! Form::close() !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div ng-contoller="requirementsController">
<table class="gridder" ng-visible="requirementFields.data.count > 0">
    <tbody>
    <tr ng-repeat="requirementField in requirementFields.data">
        <td>
            {!! Form::label('Course') !!}
            <input type="text" class="form-control" id="newCourseId" name="newCourseId[@{{requirementField.id}}]" value="@{{ requirementField.newCourseId }}" />
        </td>
        <td>
            {!! Form::label('Course Type') !!}
            <input type="text" class="form-control" id="newCourseTye" name="newCourseType[@{{requirementField.id}}]" value="@{{ requirementField.newCourseType }}" />
            <a ng-click="deleteRequirementField($index)" ><i class="fa fa-remove"></i></a>
        </td>
    </tr>
    </tbody>
</table>
<div class="row">
    <div class="span4">
        {!! Form::label('Course') !!}
        {!! Form::select('course_id', $courses, 1, ['ng-model'=>'newCourseId']) !!}
        {!! Form::hidden('program_id', $program->id, ['ng-model'=>'newProgramId']) !!}
    </div>
    <div class="span2">
        {!! Form::label('Course Type') !!}
        {!! Form::select('type', [1=>'Required',2=>'Elective'], 1, ['ng-model'=>'newCourseType']) !!}
    </div>
    <div class="span2">
        {!! Form::label('&nbsp;') !!}
        <input type="button" class="btn" value="Add Requirement Field" ng-click="addRequirementField()">
    </div>
</div>
</div>