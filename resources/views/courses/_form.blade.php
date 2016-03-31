<div class="control-group">
    {!! Form::label('number', "Number") !!}
    {!! Form::text('number', null, ['class'=>'controls']) !!}
</div>

<div class="control-group">
    {!! Form::label('title', "Title") !!}
    {!! Form::text('title', null, ['class'=>'controls']) !!}
</div>

<div class="control-group">
    {!! Form::submit('Save', ['class'=>'btn']) !!}
</div>