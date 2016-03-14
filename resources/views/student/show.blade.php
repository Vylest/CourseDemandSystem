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
    @if($student->plansOfStudy->count() > 0)
        <h3>{{ str_plural('Plan', $student->plansOfStudy->count()) }} of Study</h3>
        <table class="gridder">
            <thead>
            <tr>
                <th>Plan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student->plansOfStudy as $plan)
                <tr>
                    <td>{{ $plan->name }}</td>
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('user'))
                        <td>
                            {!! Form::model($plan, ['method'=>'delete', 'class'=>'delete_confirm',
		                               'action'=>['PlanOfStudyController@destroy', $plan->id]]) !!}
                            <a href="{{ action('PlanOfStudyController@edit', $plan->id) }}" class="btn btn-cta-red">Edit</a>
                            {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection