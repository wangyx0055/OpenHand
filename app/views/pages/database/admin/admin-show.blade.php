@extends('layouts.database')
@section('content')
<div class="row">
	<table>
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
					<a class="button tiny" href="{{ URL::to('volunteers/' . $value->id . '/edit') }}">Edit</a>
					{{ Form::open(array('url' => 'volunteers/' . $value->id)) }}
                    	{{ Form::hidden('_method', 'DELETE') }}
                    	{{ Form::submit('Delete', array('class' => 'button tiny')) }}
                	{{ Form::close() }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@stop