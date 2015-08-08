@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'guests')) }}
<div class="row oh-form-group">
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
			{{ Form::label('spouse_name', 'Spouse Name', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('spouse_name', null, array()) }}
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
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('note', 'Note', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('note', null, array('placeholder' => 'Leave blank unless you have a note to place')) }}
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