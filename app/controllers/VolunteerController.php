<?php

class VolunteerController extends BaseController 
{
	/*
	Name: doLogin
	Purpose: Process login 
	*/
	public function doLogin()
	{
		// validation rules
		$rules = array(
    		'email'    => 'required|email', 
    		'password' => 'required|alphaNum|min:3' 
		);

		// check for valid details
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) { // if validation fails, redirect back to login
    		return Redirect::to('/login')
        	->withErrors($validator) 
        	->withInput(Input::except('password')); 
		} else { // if validation succesful, check for valid user
			// get user data from form
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);

			if (Auth::attempt($userdata)) { // if user is valid, send to database search page
				return Redirect::to('/database-search');
			} else { // if user is not valid, redirect to login page
				return Redirect::to('/login');
			}
		}
	}
	
	/*
	Name: doLogout
	Purpose: Process logout
	*/
	public function doLogout()
	{
		// logout volunteer
		Auth::logout(); 
		
		// send to login page
		return Redirect::to('/login');
	}
	
	/*
	Name: doSearch
	Purpose: Process search
	*/
	public function doSearch()
	{
		// get search data
		$search = Input::get('search');
		
		// search database for id with corresponding last_name value
		$results = Guest::like('last_name', $search)->get();
		
		return View::make('pages.database.search')
			->with('results', $results);
	}
}