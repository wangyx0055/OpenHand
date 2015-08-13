@extends('layouts.database')
@section('content')
{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
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
			{{ Form::text('first_name', DB::table('people')->where('id', '=', $user->person_id)->pluck('first_name'), array()) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Last Name</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('last_name', DB::table('people')->where('id', '=', $user->person_id)->pluck('last_name'), array()) }}
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
			{{ Form::password('password', array('placeholder' => 'Leave empty if password isn\'t changing')) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Re-Password</span>
		</div>
		<div class="small-8 columns">
			{{ Form::password('password_confirmation', array('placeholder' => 'Leave empty if password isn\'t changing')) }}
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-4 columns">
			<span class="prefix">Admin</span>
		</div>
		<div class="small-8 columns">
			@if ($user->user_type == 1)
			{{ Form::select('isAdmin', array('1' => 'No', '2' => 'Yes'), null, array()) }}
			@else
			{{ Form::select('isAdmin', array('2' => 'Yes', '1' => 'No'), null, array()) }}
			@endif
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Update', array('class' => 'button small')) }}
		</div>
	</div>	
</div>
{{ Form::close() }}
@stop