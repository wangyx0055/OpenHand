@extends('layouts.default')
@section('content')
{{ Form::open(array('url' => 'login')) }}
<div class="row panel">
	<div class="row">
		<div class="small-12 columns">
			{{ HTML::ul($errors->all()) }}
		</div>
	</div>
	<div class="row">
		<div class="small-4 columns">
			<span class="prefix">Email</span>
		</div>
		<div class="small-8 columns">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'awesome@awesome.com')) }}
		</div>
	</div>
	<div class="row">
		<div class="small-4 columns">
			<span class="prefix">Password</span>
		</div>
		<div class="small-8 columns">
			{{ Form::password('password', array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Login', array('class' => 'button small')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@stop