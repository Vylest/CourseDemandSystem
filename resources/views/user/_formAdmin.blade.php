<div class="form-group span6">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group span6">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group span6">
    {!! Form::label('email', 'E-Mail') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group span6">
    {!! Form::label('type', 'Type') !!}
    {!! Form::select('type', array(1=>'user', 2=>'admin'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group span6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group span6">
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group span6">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>