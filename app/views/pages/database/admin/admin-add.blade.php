@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'users')) }}
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
			<span class="prefix">Last Name</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('last_name', null, array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Email</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('email', null, array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Password</span>
		</div>
		<div class="small-8 columns">
			{{ Form::password('password') }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Re-Password</span>
		</div>
		<div class="small-8 columns">
			{{ Form::password('password_confirmation') }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Admin?</span>
		</div>
		<div class="small-8 columns">
			{{ Form::select('isAdmin', array('1' => 'No', '2' => 'Yes'), null, array()) }}
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