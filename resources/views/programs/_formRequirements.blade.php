<div ng-controller="RequirementsController">
<table class="gridder" ng-visible="requirementFields.data.count > 0">
    <tbody>
    <tr ng-repeat="requirementField in requirementFields.data">
        <td class="span2">
            {!! Form::label('Course') !!}
            <input type="text" disabled class="form-control" id="newCourseId"  value="@{{ requirementField.courseTitle }}" />
            <input type="hidden" name="newCourseId[@{{requirementField.id}}]" value="@{{ requirementField.courseId.id }}">
        </td>
        <td class="span2">
            {!! Form::label('Course Type') !!}
            <input type="text" disabled class="form-control" id="newCourseType" value="@{{ requirementField.courseType }}" />
            <input type="hidden" name="newCourseType[@{{requirementField.id}}]" value="@{{ requirementField.type.value }}">
            <a ng-click="deleteRequirementField($index)" ><i class="fa fa-remove"></i></a>
        </td>
    </tr>
    </tbody>
</table>
<div class="row">
    <div class="span4">
        {!! Form::label('Course') !!}
        {!! Form::select('course_id', [], null, ['ng-model'=>'newCourseId', 'ng-options' => 'course as course.title for course in courses']) !!}
        {!! Form::hidden('program_id', $program->id, ['ng-model'=>'newProgramId']) !!}
    </div>
    <div class="span2">
        {!! Form::label('Course Type') !!}
        {!! Form::select('type', [], 1, ['ng-model'=>'newCourseType', 'ng-options'=>'type as type.title for type in courseTypes']) !!}
    </div>
    <div class="span2">
        {!! Form::label('&nbsp;') !!}
        <input type="button" class="btn" value="Add Requirement Field" ng-click="addRequirementField()">
    </div>
    <div class="span2">
        {!! Form::label('&nbsp;') !!}
        {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
</div>