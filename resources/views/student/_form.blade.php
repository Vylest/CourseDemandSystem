<div class="control-group">
    {!! Form::label('first_name', "First Name") !!}
    {!! Form::text('first_name', null, ['class'=>'controls']) !!}
</div>

<div class="control-group">
    {!! Form::label('last_name', "Last Name") !!}
    {!! Form::text('last_name', null, ['class'=>'controls']) !!}
</div>

<div class="control-group">
    {!! Form::label('net_id', "Network ID") !!}
    {!! Form::text('net_id', null, ['class'=>'controls']) !!}
</div>

<div class="control-group">
    {!! Form::label('nu_id', "University of Nebraska ID") !!}
    {!! Form::text('nu_id', null, ['class'=>'controls']) !!}
</div>

<div class="control-group">
    {!! Form::submit('Save', ['class'=>'btn']) !!}
</div>