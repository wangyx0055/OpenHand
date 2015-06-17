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
				return Redirect::to('/database/search');
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
		
		if (Input::get('searchBy') == 0) { // search database for id with corresponding last_name value
			$results = Guest::where('last_name', 'LIKE', '%' . $search . '%')->get();
		} else if (Input::get('searchBy') == 1) { // search database for id with corresponding first_name value
			$results = Guest::where('first_name', 'LIKE', '%' . $search . '%')->get();
		} else { // search database for id with corresponding zipcode value
			$results = Guest::where('zipcode', 'LIKE', '%' . $search . '%')->get();
		}
		
		return View::make('pages.database.search')
			->with('results', $results);
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
			$user = new User;
			
			// get guest data from form
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::Make(Input::get('password'));
			$user->isAdmin = Input::get('isAdmin');
			
			$user->save();
			
			return Redirect::to('/database/admin/add');
		}
	}
	
	/*
	Name: edit
	Purpose: Return volunteer id to the webpage
	*/
	public function edit($id)
	{
		// find guest by id
		$volunteer = User::find($id);
		
		return View::make('pages.database.admin.admin-edit')
            ->with('volunteer', $volunteer);
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
			
			// get guest data from form
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			
			if (!Input::get('password') == "") { // if password field not empty then change password
				$user->password = Hash::make(Input::get('password'));
			}
			
			$user->isAdmin = Input::get('isAdmin');
			
			$user->save();
			
			return Redirect::to('/database/admin/show-all');
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

        return Redirect::to('/database/admin/show-all');
    }
}