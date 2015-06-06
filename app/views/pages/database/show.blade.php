@extends('layouts.database')
@section('content')
<table class="table table-striped table-bordered">
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
				<a class="btn btn-small btn-info" href="{{ URL::to('guests/' . $value->id . '/edit') }}">Edit</a>
				<a class="btn btn-small btn-info" href="#">Check-in</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop