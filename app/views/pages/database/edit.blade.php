@extends('layouts.database')
@section('content')
{{ Form::model($guest, array('route' => array('guests.update', $guest->id), 'method' => 'PUT')) }}
<div class="oh-form-group">
	<div class="row">
		<div class="small-12 columns">
			{{ HTML::ul($errors->all()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('first_name', 'First Name', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('first_name', null, array()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('last_name', 'Last Name', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('last_name', null, array()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('address', 'Address', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('address', null, array()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('zipcode', 'Zipcode', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('zipcode', null, array()) }}
		</div>
	</div>
	@if (date('Y-m-d', strtotime($guest->last_visit)) != date('Y-m-d', time()))
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('checkIn', 'Check-in', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::select('checkIn', array('0' => 'No', '1' => 'Yes'), null, array()) }}
		</div>
	</div>
	@endif
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Update', array('class' => 'button tiny')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@stop