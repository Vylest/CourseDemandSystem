<div class="row">
<div class="span4">
    {!! Form::label('course_id', 'Course') !!}
    {!! Form::select('course_id', $courses) !!}
    {!! Form::label('type', 'Required Course') !!}
    {!! Form::radio('type', 0, true) !!}
    {!! Form::label('type', 'Elective Course') !!}
    {!! Form::radio('type', 1) !!}
</div>
</div>
<div class="row">
    {!! Form::submit('Save', ['class'=>'btn']) !!}
</div>
