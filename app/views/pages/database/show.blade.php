@extends('layouts.database')
@section('content')
<div class="row">
	<table>
		<thead>
			<tr>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Address</td>
				<td>Zipcode</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		@foreach($guests as $key => $value)
			<tr>
				<td>{{ $value->first_name }}</td>
				<td>{{ $value->last_name }}</td>
				<td>{{ $value->address }}</td>
				<td>{{ $value->zipcode }}</td>
				<td>
					<a class="button tiny" href="{{ URL::to('guests/' . $value->id . '/edit') }}">Edit</a>
					{{ Form::open(array('action' => array('guests.checkIn', $value->id))) }}
                   		@if ($value->last_visit == date('Y-m-d'))
						{{ Form::label('', 'Checked-in', array('class' => 'oh-label')) }}
						@else
						{{ Form::submit('Check-in', array('class' => 'button tiny')) }}
						@endif
                	{{ Form::close() }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@stop