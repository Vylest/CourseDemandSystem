<div ng-controller="RequirementsController" id="addRequirementForm" style="display:none">
    <div ng-visible="requirementFields.data.count > 0">
        <table class="gridder" id="requirementQueue" style="display:none">
            <thead>
            <tr>
                <th class="span2">Remove</th>
                <th>Course</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="requirementField in requirementFields.data">
                <td class="span2">
                    <a ng-click="deleteRequirementField($index)" ><i class="fa fa-3x fa-remove"></i></a>
                </td>
                <td>
                    {!! Form::label('Course') !!}
                    @{{ requirementField.courseTitle }}
                    <input type="hidden" name="newCourseId[@{{requirementField.id}}]" value="@{{ requirementField.courseId.id }}">
                </td>
                <td class="">
                    {!! Form::label('Course Type') !!}
                    @{{ requirementField.courseType }}
                    <input type="hidden" name="newCourseType[@{{requirementField.id}}]" value="@{{ requirementField.type.value }}">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="span4">
            {!! Form::label('Course') !!}
            {!! Form::select('course_id', [], null, ['ng-model'=>'newCourseId', 'ng-options' => 'course as course.title for course in courses', 'id'=>'requirementCourseSelect']) !!}
            {!! Form::hidden('program_id', $program->id, ['ng-model'=>'newProgramId']) !!}
        </div>
        <div class="span2">
            {!! Form::label('Course Type') !!}
            {!! Form::select('type', [], 1, ['ng-model'=>'newCourseType', 'ng-options'=>'type as type.title for type in courseTypes', 'id'=>'requirementTypeSelect']) !!}
        </div>
        <div class="span2">
            {!! Form::label('&nbsp;') !!}
            <input type="button" class="btn" id="addRequirement" value="Add Requirement Field" ng-click="addRequirementField()">
        </div>
        <div class="span2">
            {!! Form::label('&nbsp;') !!}
            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>