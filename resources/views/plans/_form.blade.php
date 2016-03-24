<div class="row-fluid">
    <div class="span4 offset1">
        <div class="row">
            {!! Form::label('program_id', 'Program') !!}
            {!! Form::select('program_id', $programs , null) !!}
            {!! Form::label('semester_id', 'Semester') !!}
            {!! Form::select('semester_id', $semester , null) !!}
            <div>
            {!! Form::submit('Save', ['class'=>'btn btn-large']) !!}
            </div>
        </div>
    </div>

    <div class="span6">
        <table class="gridder">
            <thead>
            <tr>
                <th>Program Information</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="program-info">
            </tbody>
        </table>
    </div>
</div>