@extends('layouts.app')

@section('page_title'){{ $student->name }} ({{ $student->netid }}, {{ $student->nuid }}) @endsection

@section('content')
	<div class="row">
		<div class="span6">
			<table class="gridder">
                <thead>
                <tr>
                    <th>Student Information</th>
                    <th>
                        @if(!Auth::user()->hasRole('read-only'))
                            @include('partials._operations', ['model'=>$student,'controller'=>'StudentController'])
                        @endif
                    </th>
                </tr>
                </thead>
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
		<div class="span2"></div>
		<div class="span4">

		</div>
	</div>
    @if($student->plansOfStudy->count() > 0)
        <h3>{{ str_plural('Plan', $student->plansOfStudy->count()) }} of Study</h3>
        <table class="gridder">
            <thead>
            <tr>
                <th>Plan</th>
                @if(Auth::user()->canEdit())
                    <th>
                        Operations
                        <a class="btn pull-right" href="{{ action('PlanOfStudyController@create', $student->id) }}"><i class="fa fa-plus"></i> Add a Plan of Study</a>
                    </th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($student->plansOfStudy as $plan)
                <tr>
                    <td>{{ $plan->program->name }}</td>
                    @if(Auth::user()->canEdit())
                        <td>
                            {!! Form::model($plan, ['method'=>'delete', 'class'=>'delete_confirm',
		                               'action'=>['PlanOfStudyController@destroy', $student->id, $plan->id]]) !!}
                            <a href="{{ action('PlanOfStudyController@edit', [$student->id, $plan->id]) }}" class="btn btn-cta-red">Edit</a>
                            {!! Form::submit('Delete', ['class' => 'btn']) !!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <a class="btn" href="{{ action('PlanOfStudyController@create', $student->id) }}"><i class="fa fa-plus"></i> Add a Plan of Study</a>
    @endif
@endsection