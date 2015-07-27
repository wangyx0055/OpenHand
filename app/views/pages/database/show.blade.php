@extends('layouts.database')
@section('content')
@foreach($results as $key => $value)
<div class="oh-form-group">
	<div class="row">
		<div class="medium-3 small-12 columns">
			{{ $value->last_name }}, {{ $value->first_name }}/{{ $value->spouse_name }}
		</div>
		<div class="medium-5 small-12 columns">
			{{ $value->address }}, {{ $value->zipcode }}
		</div>
		<div class="medium-2 small-12 columns">
			{{ Form::open(array('action' => array('guests.checkIn', $value->id))) }}
				@if (date('Y-m-d', strtotime($value->last_visit)) == date('Y-m-d', time()))
				{{ Form::label('', 'Checked-in at ' . date('H:i:s', strtotime($value->last_visit)), array('class' => 'oh-label-small')) }}
				@else
				{{ Form::submit('Check-in', array('class' => 'button tiny')) }}
				@endif
			{{ Form::close() }}
		</div>
		<div class="medium-2 small-12 columns">
			<a class="button tiny" href="{{ URL::to('guests/' . $value->id . '/edit') }}">Edit</a>
		</div>
		<div class="small-12 columns">
			<i>{{ $value->note }}</i>
		</div>
	</div>
</div>
@endforeach
@stop