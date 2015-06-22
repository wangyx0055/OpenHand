@extends('layouts.database')
@section('content')
@foreach($guests as $key => $value)
<div class="row">
	<div class="medium-3 small-12 columns">
		{{ Person::find($value->person_id)->last_name }}, {{ Person::find($value->person_id)->first_name }}
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
</div>
@endforeach
@stop