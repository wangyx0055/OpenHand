@extends('layouts.database')
@section('content')
@foreach($users as $key => $value)
<div class="row">
	<div class="medium-4 small-12 columns">
		{{ $value->name }}
	</div>
	<div class="medium-4 small-12 columns">
		{{ $value->email }}
	</div>
	<div class="medium-2 small-6 columns">
		<a class="button tiny" href="{{ URL::to('volunteers/' . $value->id . '/edit') }}">Edit</a>
	</div>
	<div class="medium-2 small-6 columns">
		{{ Form::open(array('url' => 'volunteers/' . $value->id)) }}
        	{{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', array('class' => 'button tiny')) }}
        {{ Form::close() }}
	</div>
</div>
@endforeach
@stop