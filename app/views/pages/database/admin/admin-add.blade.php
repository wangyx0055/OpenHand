@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'volunteers')) }}
<div class="oh-form-group">
	<div class="row">
		<div class="small-12 columns">
			{{ HTML::ul($errors->all()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('name', 'Name', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('name', null, array('placeholder' => 'Bob')) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('email', 'Email', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('email', null, array('placeholder' => 'bobsmith@example.com')) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('password', 'Password', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::password('password') }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('password_confirmation', 'Re-Type Password', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::password('password_confirmation') }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('isAdmin', 'Is Admin', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::select('isAdmin', array('0' => 'No', '1' => 'Yes'), null, array()) }}
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Add', array('class' => 'button tiny')) }}
		</div>
	</div>	
</div>
{{ Form::close() }}
@stop