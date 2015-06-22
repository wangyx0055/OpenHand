@extends('layouts.database')
@section('content')
@foreach($users as $key => $value)
<div class="row">
	<div class="medium-3 small-12 columns">
		{{ Person::find($value->person_id)->last_name }}, {{ Person::find($value->person_id)->first_name }}
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
@endforeach
@stop