<div class="row">
    <div class="span3">
        {!! Form::label('name', "Name") !!}
        {!! Form::text('name', null, ['class'=>'controls']) !!}
    </div>

    <div class="span3">
        {!! Form::label('type', "Type") !!}
        {!! Form::text('type', null, ['class'=>'controls']) !!}
    </div>

    <div class="span3">
        {!! Form::label('career', "Career") !!}
        {!! Form::text('career', null, ['class'=>'controls']) !!}
    </div>

    <div class="span3">
        {!! Form::label('credits_required', "Credits Required") !!}
        {!! Form::text('credits_required', null, ['class'=>'controls']) !!}
    </div>
</div>

<div class="row">
    <div class="span3">
        {!! Form::submit('Save', ['class'=>'btn btn-cta-red btn-large']) !!}
    </div>
</div>