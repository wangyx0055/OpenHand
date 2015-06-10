@extends('layouts.database')
@section('content')
<div class="row">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>isAdmin</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $key => $value)
			<tr>
				<td>{{ $value->first_name }}</td>
				<td>{{ $value->last_name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->isAdmin }}</td>
				<td>
					<a class="btn btn-small btn-info" href="{{ URL::to('volunteers/' . $value->id . '/edit') }}">Edit</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@stop