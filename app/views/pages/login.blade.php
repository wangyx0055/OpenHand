@extends('layouts.default')
@section('content')
{{ Form::open(array('url' => 'login')) }}
<div class="oh-form-group">
	<div class="row">
		<div class="small-12 columns">
			{{ HTML::ul($errors->all()) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('email', 'Email Address', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'awesome@awesome.com')) }}
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('password', 'Password', array('class' => 'oh-label')) }}
		</div>
		<div class="large-10 small-12 columns">
			{{ Form::password('password', array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Login', array('class' => 'button tiny')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@stop