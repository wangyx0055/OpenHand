@extends('layouts.database')
@section('content')
@foreach($guests as $key => $value)
<div class="row">
	<div class="medium-3 small-12 columns">
		{{ $value->last_name }}, {{ $value->first_name }}
	</div>
	<div class="medium-5 small-12 columns">
		{{ $value->address }}, {{ $value->zipcode }}
	</div>
	<div class="medium-2 small-6 columns">
		<a class="button tiny" href="{{ URL::to('guests/' . $value->id . '/edit') }}">Edit</a>
	</div>
	<div class="medium-2 small-6 columns">
		{{ Form::open(array('action' => array('guests.checkIn', $value->id))) }}
            @if (date('Y-m-d', strtotime($value->last_visit)) == date('Y-m-d'))
			{{ Form::label('', 'Checked-in', array('class' => 'oh-label-small')) }}
			@else
			{{ Form::submit('Check-in', array('class' => 'button tiny')) }}
			@endif
        {{ Form::close() }}
	</div>
</div>
@endforeach
@stop