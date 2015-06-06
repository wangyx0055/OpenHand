<?php

class GuestController extends BaseController
{
	/*
	Name: edit
	Purpose: Return guest id to the webpage
	*/
	public function edit($id)
	{
		// find guest by id
		$guest = Guest::find($id);
		
		return View::make('pages.database.edit')
            ->with('guest', $guest);
	}
	
	/*
	Name: update
	Purpose: Update guest passed into the function
	*/
	public function update($id)
	{
		// validation rules
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'zipcode' => 'required'
		);
		
		// check for valid details
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) { // if validation fails, redirect back to database-add
			return Redirect::to('guests/' . $value->id . '/edit')
				->withErrors($validator);
		} else { // if validation succesful, add new guest
			$guest = Guest::find($id);
			
			// get guest data from form
			$guest->first_name = Input::get('first_name');
			$guest->last_name = Input::get('last_name');
			$guest->address = Input::get('address');
			$guest->zipcode = Input::get('zipcode');
			$guest->last_visit = date('Y-m-d');
			
			$guest->save();
			
			return Redirect::to('/database-search');
		}
	}
	
	/*
	Name: store
	Purpose: Store a new guest 
	*/
	public function store()
	{
		// validation rules
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'zipcode' => 'required'
		);
		
		// check for valid details
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) { // if validation fails, redirect back to database-add
			return Redirect::to('/database-add')
				->withErrors($validator);
		} else { // if validation succesful, add new guest
			$guest = new Guest;
			
			// get guest data from form
			$guest->first_name = Input::get('first_name');
			$guest->last_name = Input::get('last_name');
			$guest->address = Input::get('address');
			$guest->zipcode = Input::get('zipcode');
			$guest->last_visit = date('Y-m-d');
			
			$guest->save();
			
			return Redirect::to('/database-add');
		}
	}
}