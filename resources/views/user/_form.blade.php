<div class="control-group span6">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::label('email', 'E-Mail') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="control-group span6">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
