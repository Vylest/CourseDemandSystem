<div class="row">
    <div class="span4">
        {!! Form::select('program_id', $programs , null) !!}
    </div>
</div>
<div class="row">
    <div class="span4">
        {!! Form::select('semester', $semester , null) !!}
    </div>
</div>
<div class="row">
    <div class="span4">
        {!! Form::submit('Save') !!}
    </div>
</div>