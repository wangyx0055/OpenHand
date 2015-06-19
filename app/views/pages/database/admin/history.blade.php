@extends('layouts.database')
@section('content')
<div class="row">
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('from_date', 'From', array('class' => 'oh-label')) }}
		</div>
		<div class="large-5 small-6 columns">
			{{ Form::select('from_month', array('0' => 'January', '1' => 'February', '2' => 'March', '3' => 'April', '4' => 'May', '5' => 'June', '6' => 'July', '7' => 'August', '8' => 'September', '9' => 'October', '10' => 'November', '11' => 'December'), null, array()) }}
		</div>
		<div class="large-5 small-6 columns">
			<select name="from_year">
				@foreach($years as $key => $value)
				<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('to_date', 'To', array('class' => 'oh-label')) }}
		</div>
		<div class="large-5 small-6 columns">
			{{ Form::select('to_month', array('0' => 'January', '1' => 'February', '2' => 'March', '3' => 'April', '4' => 'May', '5' => 'June', '6' => 'July', '7' => 'August', '8' => 'September', '9' => 'October', '10' => 'November', '11' => 'December'), null, array()) }}
		</div>
		<div class="large-5 small-6 columns">
			<select name="from_year">
				@foreach($years as $key => $value)
				<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Search', array('class' => 'button tiny')) }}
		</div>
	</div>
</div>
@stop