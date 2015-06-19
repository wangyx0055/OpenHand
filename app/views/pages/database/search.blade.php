@extends('layouts.database')
@section('content')
{{ Form::open(array('url' => 'search')) }}
<div class="oh-form-group">
	<div class="row">
		<div class="small-12 columns">
			{{ Form::select('searchBy', array('0' => 'Search by Last Name', '1' => 'Search by First Name', '2' => 'Search by Zipcode'), null, array()) }}
		</div>
		<div class="small-8 columns">
			{{ Form::text('search', Input::old('search')) }}
		</div>
		<div class="small-4 columns">
			{{ Form::submit('Search', array('class' => 'button tiny')) }}
		</div>
	</div>
</div>
{{ Form::close() }}
@if ($results != '')
@foreach($results as $key => $value)
<div class="row">
	<div class="medium-3 small-12 columns">
		{{ $value->last_name }}, {{ $value->first_name }}
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
@endif
<div class="row">
	<div class="small-12 columns">
		Click <a href="/database/show-all">here</a> to see all guests
	</div>
</div>
@stop