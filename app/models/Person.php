<?php

class Person extends Eloquent
{
	// search database for id with corresponding last_name value
	public function scopeGetByLastName($query, $search)
	{
		return $query
				->select('id', 'first_name', 'last_name')
				->where('last_name', 'LIKE', '%' . $search . '%')
				->where('person_type', '=', 2);
	}
	
	// search database for id with corresponding first_name value
	public function scopeGetByFirstName($query, $search)
	{
		return $query
				->select('id', 'first_name', 'last_name')
				->where('first_name', 'LIKE', '%' . $search . '%')
				->where('person_type', '=', 2);
	}
}