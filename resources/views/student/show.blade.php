@extends('layouts.app')

@section('page_title'){{ $student->name }} ({{ $student->netid }}, {{ $student->nuid }}) @endsection

@section('content')
	<div class="row">
		<div class="span6">
			<table class="gridder">
				<tbody>
					<tr>
						<td>Status</td>
						<td>{{ $student->status }}</td>
					</tr>
					<tr>
						<td>Outstanding Foundation Classes</td>
						<td>{{ $student->foundation_outstanding ? 'Yes' : 'No' }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="span4"></div>
		<div class="span2">
		    {!! Form::model($student, ['method'=>'delete', 'class'=>'delete_confirm',
		                               'action'=>['StudentController@destroy', $student->id]]) !!}
		        <a href="{{ action('StudentController@edit', $student->id) }}" class="btn btn-cta-red">Edit</a>
		        {!! Form::submit('Delete', ['class' => 'btn']) !!}
		    {!! Form::close() !!}
		</div>
	</div>

    <h3>{{ str_plural('Plan', $student->plansOfStudy->count()) }} of Study</h3>
@endsection