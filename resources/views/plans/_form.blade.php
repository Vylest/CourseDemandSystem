<div class="row">
    <div class="span4">
        {!! Form::label('program_id', 'Program') !!}
        {!! Form::select('program_id', $programs , null) !!}
    </div>
</div>
<div class="row">
    <div class="span4">
        {!! Form::label('semester_id', 'Semester') !!}
        {!! Form::select('semester_id', $semester , null) !!}
    </div>
</div>
<div class="row">
    <div class="span4">
        {!! Form::submit('Save') !!}
    </div>
</div>