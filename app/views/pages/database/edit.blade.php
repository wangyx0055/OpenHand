@extends('layouts.database')
@section('content')
{{ Form::model($guest, array('route' => array('guests.update', $guest->id), 'method' => 'PUT')) }}
<div class="row panel">
	<div class="row">
		<div class="small-12 columns">
			{{ HTML::ul($errors->all()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">First Name</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('first_name', DB::table('people')->where('id', '=', $guest->person_id)->pluck('first_name'), array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Spouse Name</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('spouse_name', null, array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Last Name</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('last_name', DB::table('people')->where('id', '=', $guest->person_id)->pluck('last_name'), array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Address</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('address', null, array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Zipcode</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('zipcode', null, array()) }}
		</div>
	</div>
	@if (date('Y-m-d', strtotime($guest->last_visit)) != date('Y-m-d', time()))
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Check-in</span>
		</div>
		<div class="small-8 columns">
			{{ Form::select('checkIn', array('1' => 'No', '2' => 'Yes'), null, array()) }}
		</div>
	</div>
	@endif
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Update', array('class' => 'button small')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@stop