@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'history_search')) }}
<div class="row panel">
	<div class="row collapse prefix-radius">
		<div class="small-2 columns">
			<span class="prefix">From</span>
		</div>
		<div class="small-5 columns">
			{{ Form::select('from_month', array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'), null, array()) }}
		</div>
		<div class="small-5 columns">
			<select name="from_year">
				@foreach($years as $key => $value)
				<option value="{{ $value }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row collapse prefix-radius">
		<div class="small-2 columns">
			<span class="prefix">To</span>
		</div>
		<div class="small-5 columns">
			{{ Form::select('to_month', array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'), null, array()) }}
		</div>
		<div class="small-5 columns">
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
<div class="row panel">
	<div class="small-12 columns">
		Number of guests between {{ $beginTime }} and {{ $endTime }}: {{ $results }}
	</div>
</div>
@endif
@stop