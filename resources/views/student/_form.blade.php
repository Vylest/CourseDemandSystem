<div class="row">
	<div class="span3">
	    {!! Form::label('first_name', "First Name") !!}
	    {!! Form::text('first_name', null, ['class'=>'controls']) !!}
	</div>

	<div class="span3">
	    {!! Form::label('last_name', "Last Name") !!}
	    {!! Form::text('last_name', null, ['class'=>'controls']) !!}
	</div>

	<div class="span3">
	    {!! Form::label('netid', "NetID") !!}
	    {!! Form::text('netid', null, ['class'=>'controls']) !!}
	</div>

	<div class="span3">
	    {!! Form::label('nuid', "NUID") !!}
	    {!! Form::text('nuid', null, ['class'=>'controls']) !!}
	</div>
</div>

<div class="row">
	<div class="span3">
	    {!! Form::submit('Save', ['class'=>'btn btn-cta-red btn-large']) !!}
	</div>
</div>
