@extends('layouts.database')
@section('content')
@foreach($results as $key => $value)
<div class="oh-form-group">
	<div class="row">
		<div class="medium-3 small-12 columns">
			{{ $value->last_name }}, {{ $value->first_name }}
		</div>
		<div class="medium-5 small-12 columns">
			{{ $value->email }}
		</div>
		<div class="medium-2 small-6 columns">
			<a class="button tiny" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit</a>
		</div>
		<div class="medium-2 small-6 columns">
			{{ Form::open(array('url' => 'users/' . $value->id)) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'button tiny')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@endforeach
@stop