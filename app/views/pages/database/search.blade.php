@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'search')) }}
<div class="oh-form-group">
	<div class="row">
		<div class="large-9 small-12 columns">
			{{ Form::text('search', Input::old('search'), array('placeholder' => 'Last Name')) }}
		</div>
		<div class="large-3 small-12 columns">
			{{ Form::submit('Search', array('class' => 'button tiny')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@if ($results != '')
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
	@foreach($results as $key => $value)
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
@endif
<div class="row">
	<div class="small-12 columns">
		Click <a href="/database/show-all">here</a> to see all guests
	</div>
</div>
@stop