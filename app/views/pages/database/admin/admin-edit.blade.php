@extends('layouts.database')
@section('content')
{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
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
			{{ Form::text('first_name', DB::table('people')->where('id', '=', $user->person_id)->pluck('first_name'), array()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('last_name', 'Last Name', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('last_name', DB::table('people')->where('id', '=', $user->person_id)->pluck('last_name'), array()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('email', 'Email', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('email', null, array()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('password', 'Password', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::password('password', array('placeholder' => 'Leave empty if password isn\'t changing')) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('password_confirmation', 'Re-Type Password', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::password('password_confirmation', array('placeholder' => 'Leave empty if password isn\'t changing')) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('isAdmin', 'Is Admin', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			@if ($user->user_type == 1)
			{{ Form::select('isAdmin', array('1' => 'No', '2' => 'Yes'), null, array()) }}
			@else
			{{ Form::select('isAdmin', array('2' => 'Yes', '1' => 'No'), null, array()) }}
			@endif
		</div>
	</div>
	<div cla
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Update', array('class' => 'button tiny')) }}
		</div>
	</div>	
</div>
{{ Form::close() }}
@stop