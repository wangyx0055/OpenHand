<?php

class UserController extends BaseController 
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
				return Redirect::to('/database/search')
					->with('pageTitle', 'Volunteer Only');
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
		return Redirect::to('/login')
			->with('pageTitle', 'Volunteer Only');
	}
	
	/*
	Name: doSearch
	Purpose: Process search
	*/
	public function doSearch()
	{
		// get search data
		$search = Input::get('search');
		
		if (Input::get('searchBy') == 0) { // search database for id with corresponding last_name value
			$results = Person::where(function ($query) use ($search) {
				$query->where('last_name', 'LIKE', '%' . $search . '%');
			})->where('person_type', '=', 2)->get();
		} else if (Input::get('searchBy') == 1) { // search database for id with corresponding first_name value
			$results = Person::where(function ($query) use ($search) {
				$query->where('first_name', 'LIKE', '%' . $search . '%');
			})->where('person_type', '=', 2)->get();
		} 
		
		return View::make('pages.database.search')
			->with('results', $results)
			->with('pageTitle', 'Volunteer Only');
	}
	
	/*
	Name: doHistorySearch
	Purpose: Process history search
	*/
	public function doHistorySearch()
	{
		// make starting point
		$startYear = idate('Y', strtotime('2015'));
		// get current year
		$currentYear = idate('Y', time());
		$stringOfYears = '';
		
		// generate all the years between the start and end
		while ($currentYear >= $startYear)
		{
			$stringOfYears .= $startYear;

			if ($startYear != $currentYear)
				$stringOfYears .= ',';

			$startYear++;
		}
	
		// split string into array
		$stringOfYears = explode(',', $stringOfYears);
		
		// get input from form
		$beginTime = Input::get('from_year') . '-' . Input::get('from_month');
		$endTime = Input::get('to_year') . '-' . Input::get('to_month');
		
		// search database for all records between the two dates and count them
		$results = DB::table('guest_histories')
			->where('date_of_visit', '>=', date('Y-m', strtotime($beginTime . " +1 days")))
			->where('date_of_visit', '<=', date('Y-m', strtotime($endTime . " +31 days")))
			->count();
	
		return View::make('pages.database.admin.history')
			->with('years', $stringOfYears)
			->with('results', $results)
			->with('beginTime', $beginTime)
			->with('endTime', $endTime)
			->with('pageTitle', 'Admin Only');
	}
	
	/*
	Name: store
	Purpose: Store a new volunteer
	*/
	public function store()
	{
		// validation rules
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:3|confirmed',
			'password_confirmation' => 'required|min:3'
		);
		
		// check for valid details
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) { // if validation fails, redirect back to database-add
			return Redirect::to('/database/admin/add')
				->withErrors($validator);
		} else { // if validation succesful, add new guest
			// declare new person
			$person = new Person;
			
			// get data from form
			$person->first_name = Input::get('first_name');
			$person->last_name = Input::get('last_name');
			$person->person_type = 1;
			
			$person->save();
			
			// declare new user
			$user = new User;
			
			// get data from form
			$user->person_id = $person->id;
			$user->email = Input::get('email');
			$user->password = Hash::Make(Input::get('password'));
			$user->user_type = Input::get('isAdmin');
			
			$user->save();
			
			return Redirect::to('/database/admin/show-all')
				->with('pageTitle', 'Admin Only');
		}
	}
	
	/*
	Name: edit
	Purpose: Return user id to the webpage
	*/
	public function edit($id)
	{
		// find guest by id
		$user = User::find($id);
		
		return View::make('pages.database.admin.admin-edit')
            ->with('user', $user)
			->with('pageTitle', 'Admin Only');
	}
	
	/*
	Name: update
	Purpose: Update volunteer passed into the function
	*/
	public function update($id)
	{
		// validation rules
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'password' => 'min:3|confirmed',
			'password_confirmation' => 'min:3'
		);
		
		// check for valid details
		$validator = Validator::make(Input::all(), $rules);
	
		if ($validator->fails()) { // if validation fails, redirect back to database-add
			return Redirect::to('volunteers/' . $id . '/edit')
				->withErrors($validator);
		} else { // if validation succesful, add new guest
			$user = User::find($id);
			
			$user->email = Input::get('email');
			
			if (!Input::get('password') == "") { // if password field not empty then change password
				$user->password = Hash::make(Input::get('password'));
			}
			
			$user->user_type = Input::get('isAdmin');
			
			$user->save();
			
			$person = Person::find($user->person_id);
			
			// get guest data from form
			$person->first_name = Input::get('first_name');
			$person->last_name = Input::get('last_name');
			
			$person->save();
			
			return Redirect::to('/database/admin/show-all')
				->with('pageTitle', 'Admin Only');
		}
	}
	
	/*
	Name: delete
	Purpose: Delete volunteer passed into the function
	*/
	public function destroy($id)
    {
		$user = User::find($id);
		$user->delete();

        return Redirect::to('/database/admin/show-all')
			->with('pageTitle', 'Admin Only');
    }
}