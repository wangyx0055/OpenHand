@extends('layouts.database')
@section('content')
<div class="row panel">
	@foreach($results as $key => $value)
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
				{{ Form::label('', 'Checked-in at ' . date('H:i:s', strtotime($value->last_visit)), array()) }}
				@else
				{{ Form::submit('Check-in', array('class' => 'button tiny')) }}
				@endif
			{{ Form::close() }}
		</div>
		<div class="medium-2 small-12 columns">
			<a class="button tiny" href="{{ URL::to('guests/' . $value->id . '/edit') }}">Edit</a>
		</div>
		{{ Form::open(array('action' => array('guests.addNote', $value->id))) }}
			<div class="medium-10 small-12 columns">
				{{ Form::text('note', DB::table('notes')->where('guest_id', '=', $value->id)->pluck('note'), array()) }}
			</div>
			<div class="medium-2 small-12 columns">
				{{ Form::submit('Add Note', array('class' => 'button tiny')) }}
			</div>
		{{ Form::close() }}
	</div>
	@endforeach
</div>
@stop