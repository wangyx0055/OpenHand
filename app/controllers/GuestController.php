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
            ->with('guest', $guest)
			->with('pageTitle', 'Volunteer Only');
	}
	
	/*
	Name: update
	Purpose: Update guest passed into the function
	*/
	public function update($id)
	{
		// validation rules
		$rules = array(
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'address' => 'required',
			'zipcode' => 'required|numeric'
		);
		
		// check for valid details
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) { // if validation fails, redirect back to database-add
			return Redirect::to('guests/' . $id . '/edit')
				->withErrors($validator);
		} else { // if validation succesful, add new guest
			$guest = Guest::find($id);
			
			// get data from form
			$guest->spouse_name = Input::get('spouse_name');
			$guest->address = Input::get('address');
			$guest->zipcode = Input::get('zipcode');
			
			$guest->save();
			
			$person = Person::find($guest->person_id);
			
			// get data from form
			$person->first_name = Input::get('first_name');
			$person->last_name = Input::get('last_name');
			
			$person->save();
			
			if (Input::get('checkIn') == 2) { // check-in if option is selected
				return $this->checkIn($guest->id);
			} else {
				return Redirect::to('/database/search')
					->with('pageTitle', 'Volunteer Only');
			}
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
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'address' => 'required',
			'zipcode' => 'required|numeric'
		);
		
		// check for valid details
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) { // if validation fails, redirect back to database-add
			return Redirect::to('/database/add')
				->withErrors($validator);
		} else { // if validation succesful, add new guest
			$person = new Person;
			
			// get data from form
			$person->first_name = Input::get('first_name');
			$person->last_name = Input::get('last_name');
			$person->person_type = 2;
			
			$person->save();
			
			$guest = new Guest;
			
			$guest->person_id = $person->id;
			$guest->spouse_name = Input::get('spouse_name');
			$guest->address = Input::get('address');
			$guest->zipcode = Input::get('zipcode');
			$guest->last_visit = date("Y-m-d H:i:s");
			
			$guest->save();
			
			return $this->checkIn($guest->id);
		}
	}
	
	/*
	Name: checkIn
	Purpose: Check-in a guest
	*/
	public function checkIn($id)
	{
		// find guest by id
		$guest = Guest::find($id);
		
		// make guest last visit equal todays date
		$guest->last_visit = date("Y-m-d H:i:s");
			
		$guest->save();
		
		// create a new row in history table
		$history = new GuestHistory;
		
		// add history date
		$history->guest_id = $guest->id;
		$history->date_of_visit = date("Y-m-d");
		
		$history->save();
		
		return Redirect::to('/database/search')
			->with('pageTitle', 'Volunteer Only');
	}
	
	/*
	name: addNote
	purpose: add a new note
	*/
	public function addNote($id)
	{
		if (Note::find($id)) {
			// find old note value
			$note = Note::find($id);

			// get data from form
			$note->note = Input::get('note');
			$note->guest_id = $id;

			// save note
			$note->save();
		} else {
			// declare new note
			$note = new Note;

			// get data from form
			$note->note = Input::get('note');
			$note->guest_id = $id;

			// save note
			$note->save();
		}
		
		return Redirect::to('/database/search')
			->with('pageTitle', 'Volunteer Only');
	}
}