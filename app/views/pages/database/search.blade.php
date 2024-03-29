@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'search')) }}
<div class="row panel">
	<div class="row">
		<div class="small-12 columns">
			{{ Form::select('searchBy', array('0' => 'Search by Last Name', '1' => 'Search by First Name'), null, array()) }}
		</div>
	</div>
	<div class="row collapse postfix-round">
		<div class="small-9 columns">
			{{ Form::text('search', Input::old('search')) }}
		</div>
		<div class="small-3 columns">
			{{ Form::submit('Search', array('class' => 'button postfix')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@if ($results != '')
@foreach($results as $key => $value)
	<div class="row panel">
		<div class="row">
			<div class="medium-3 small-12 columns">
				{{ $value->last_name }}, {{ $value->first_name }}
			</div>
			<div class="medium-5 small-12 columns">
				{{ DB::table('guests')->where('person_id', '=', $value->id)->pluck('address') }}, {{ DB::table('guests')->where('person_id', '=', $value->id)->pluck('zipcode') }}
			</div>
			<div class="medium-2 small-12 columns">
				{{ Form::open(array('action' => array('guests.checkIn', $value->id))) }}
					@if (date('Y-m-d', strtotime(DB::table('guests')->where('person_id', '=', $value->id)->pluck('last_visit'))) == date('Y-m-d', time()))
					{{ Form::label('', 'Checked-in at ' . date('H:i:s', strtotime(DB::table('guests')->where('person_id', '=', $value->id)->pluck('last_visit'))), array('class' => 'oh-label-small')) }}
					@else
					{{ Form::submit('Check-in', array('class' => 'button tiny')) }}
					@endif
				{{ Form::close() }}
			</div>
			<div class="medium-2 small-12 columns">
				<a class="button tiny" href="{{ URL::to('guests/' . $value->id . '/edit') }}">Edit</a>
			</div>
		</div>
		{{ Form::open(array('action' => array('guests.addNote', $value->id))) }}
			<div class="row">
				<div class="small-9 columns">
					{{ Form::text('note', DB::table('notes')->where('guest_id', '=', $value->id)->pluck('note'), array()) }}
				</div>
				<div class="small-3 columns">
					{{ Form::submit('Add Note', array('class' => 'button tiny')) }}
				</div>
			</div>
		{{ Form::close() }}
	</div>
@endforeach
<div class="row panel">
	<div class="row">
		<div class="small-12 columns">
			Click <a href="/database/show-all">here</a> to see all guests
		</div>
	</div>
</div>
@endif
@stop