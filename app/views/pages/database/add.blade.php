@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'guests')) }}
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
			{{ Form::text('first_name', null, array()) }}
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
			{{ Form::text('last_name', null, array()) }}
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
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Add', array('class' => 'button small')) }}
		</div>
	</div>	
</div>
{{ Form::close() }}
@stop