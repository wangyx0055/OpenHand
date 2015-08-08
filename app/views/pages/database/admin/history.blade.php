@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'history_search')) }}
<div class="row oh-form-group">
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('from_date', 'From', array('class' => 'oh-label')) }}
		</div>
		<div class="large-5 small-6 columns">
			{{ Form::select('from_month', array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'), null, array()) }}
		</div>
		<div class="large-5 small-6 columns">
			<select name="from_year">
				@foreach($years as $key => $value)
				<option value="{{ $value }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="large-2 small-12 columns">
			{{ Form::label('to_date', 'To', array('class' => 'oh-label')) }}
		</div>
		<div class="large-5 small-6 columns">
			{{ Form::select('to_month', array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'), null, array()) }}
		</div>
		<div class="large-5 small-6 columns">
			<select name="to_year">
				@foreach($years as $key => $value)
				<option value="{{ $value }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			{{ Form::submit('Search', array('class' => 'button small')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@if ($results != '')
<div class="row">
	<div class="small-12 columns">
		Number of guests between {{ $beginTime }} and {{ $endTime }}: {{ $results }}
	</div>
</div>
@endif
@stop