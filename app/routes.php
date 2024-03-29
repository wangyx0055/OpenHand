<?php

/*
Purpose: Redirect to home page
Uses: app/views/pages/home.blade.php
*/
Route::get('/', function()
{
	return View::make('pages.home')
		->with('pageTitle', 'Home');
});

/*
Purpose: Redirect to guidelines page
Uses: app/views/pages/guidelines.blade.php
*/
Route::get('/ministry-guidelines', function()
{
	return View::make('pages.guidelines')
		->with('pageTitle', 'Ministry Guidelines');
});

/*
Purpose: Redirect to vision page
Uses: app/views/pages/vision.blade.php
*/
Route::get('/vision', function()
{
	return View::make('pages.vision')
		->with('pageTitle', 'Vision');
});

/*
Purpose: Redirect to statement page
Uses: app/views/pages/statement.blade.php
*/
Route::get('/statement-of-faith', function()
{
	return View::make('pages.statement')
		->with('pageTitle', 'Statement of Faith');
});

/*
Purpose: Redirect to contact us page
Uses: app/views/pages/contact.blade.php
*/
Route::get('/contact-us', function()
{
	return View::make('pages.contact')
		->with('pageTitle', 'Contact Us');
});

/*
Purpose: Redirect to get involved page
Uses: app/views/pages/involved.blade.php
*/
Route::get('/get-involved', function()
{
	return View::make('pages.involved')
		->with('pageTitle', 'Get Involved');
});

/*
Purpose: Redirect to charter page
Uses: app/views/pages/charter.blade.php
*/
Route::get('/charter', function()
{
	return View::make('pages.charter')
		->with('pageTitle', 'Charter');
});

/*
Purpose: Redirect to frequently asked questions page
Uses: app/views/pages/faq.blade.php
*/
Route::get('/frequently-asked-questions', function()
{
	return View::make('pages.faq')
		->with('pageTitle', 'Frequently Asked Questions');
});

/*
Purpose: Redirect to volunteer login page
Uses: app/views/pages/login.blade.php
*/
Route::get('/login', function()
{
	return View::make('pages.login')
		->with('pageTitle', 'Volunteer Login');
});

/*
Purpose: Redirect to add to note page
Uses: app/views/pages/database/note/add.blade.php
*/
/*Route::get('/database/note/add', function()
{
	if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.note.add')
			->with('pageTitle', 'Volunteer Only');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});*/

/*
Purpose: Redirect to add to database page
Uses: app/views/pages/database/add.blade.php
*/
Route::get('/database/add', function()
{
	if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.add')
			->with('pageTitle', 'Volunteer Only');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});

/*
Purpose: Redirect to edit guest page
Uses: app/views/pages/database/edit.blade.php
*/
/*Route::get('/database/edit', function()
{
	if (Auth::check()) { // if valid admin logged in
		return View::make('pages.database.edit')
			->with('pageTitle', 'Volunteer Only');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});*/

/*
Purpose: Redirect to search database page
Uses: app/views/pages/database/search.blade.php
*/
Route::get('/database/search', function()
{
	if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.search')
			->with('results', '')
			->with('pageTitle', 'Volunteer Only');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});

/*
Purpose: Redirect to view all database page
Uses: app/views/pages/database/show.blade.php
*/
Route::get('/database/show-all', function()
{
	$results = DB::table('people')
				->where('person_type', '=', '2')
				->join('guests', 'people.id', '=', 'guests.person_id')
				->orderBy('last_name', 'ASC')
				->get();
	
	if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.show')
			->with('results', $results)
			->with('pageTitle', 'Volunteer Only');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});

/*
Purpose: Redirect to view admins view all user page
Uses: app/views/pages/database/admin/show.blade.php
*/
Route::get('/database/admin/show-all', function()
{
	$results = DB::table('people')
				->where('person_type', '=', '1')
				->join('users', 'people.id', '=', 'users.person_id')
				->orderBy('last_name', 'ASC')
				->get();
	
	if (Auth::check() && Auth::user()->user_type == 2) { // if valid admin logged in
		return View::make('pages.database.admin.admin-show')
			->with('results', $results)
			->with('pageTitle', 'Admin Only');
	} else if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.search')
			->with('pageTitle', 'Volunteer Only')
			->with('results', '');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});

/*
Purpose: Redirect to view admins add user page
Uses: app/views/pages/database/admin/add.blade.php
*/
Route::get('/database/admin/add', function()
{
	if (Auth::check() && Auth::user()->user_type == 2) { // if valid admin logged in
		return View::make('pages.database.admin.admin-add')
			->with('pageTitle', 'Admin Only');
	} else if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.search')
			->with('pageTitle', 'Volunteer Only')
			->with('results', '');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});

/*
Purpose: Redirect to view admins view edit user page
Uses: app/views/pages/database/admin/edit.blade.php
*/
/*Route::get('/database/admin/edit', function()
{
	if (Auth::check() && Auth::user()->user_type == 2) { // if valid admin logged in
		return View::make('pages.database.admin.admin-edit')
			->with('pageTitle', 'Admin Only');
	} else if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.search')
			->with('pageTitle', 'Volunteer Only')
			->with('results', '');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});*/

/*
Purpose: Redirect to history database page
Uses: app/views/pages/database/admin/history.blade.php
*/
Route::get('/database/admin/history', function()
{
	$startYear = idate('Y', strtotime('2015'));
	$currentYear = idate('Y', time());
	$stringOfYears = '';
	
	while ($currentYear >= $startYear)
	{
		$stringOfYears .= $startYear;
		
		if ($startYear != $currentYear)
			$stringOfYears .= ',';
			
		$startYear++;
	}
	
	$stringOfYears = explode(',', $stringOfYears);
	
	$results = '';
	
	// get last month 
	//$lastMonth = GuestHistory::getGuestCount(date('Y-m', strtotime('Y-m' . " - 1 month")), date('Y-m', strtotime('Y-m' . " - 1 month")))->count();
		
	// get current month
	$thisMonth = GuestHistory::getGuestCount(date('Y-m'), date('Y-m'))->count();
	
	if (Auth::check() && Auth::user()->user_type == 2) { // if valid admin logged in
		return View::make('pages.database.admin.history')
			->with('years', $stringOfYears)
			->with('results', $results)
			//->with('lastMonth', $lastMonth)
			->with('thisMonth', $thisMonth)
			->with('pageTitle', 'Admin Only');
	} else if (Auth::check()) { // if valid user logged in
		return View::make('pages.database.search')
			->with('pageTitle', 'Volunteer Only')
			->with('results', '');
	} else { // if valid user is not logged in
		return View::make('pages.login')
			->with('pageTitle', 'Volunteer Login');
	}
});

/*
Purpose: Process login
Uses: app/controllers/UserController.php
*/
Route::post('login', array('uses' => 'UserController@doLogin'));

/*
Purpose: Process logout
Uses: app/controllers/UserController.php
*/
Route::get('/logout', array('uses' => 'UserController@doLogout'));

/*
Purpose: Process guest check-in
Uses: app/controllers/GuestController.php
*/
Route::post('guest/{id}/check-in', array('as' => 'guests.checkIn', 'uses' => 'GuestController@checkIn'));

/*
purpose: add a new note for guest
uses: app/controllers/NoteController.php
*/
Route::post('guest/note/{id}', array('as' => 'guests.addNote', 'uses' => 'GuestController@addNote'));

/*
Purpose: Connect GuestController to use function inside of it
Uses: app/controllers/GuestController.php
*/
Route::resource('guests', 'GuestController');

/*
Purpose: Connect NoteController to use function inside of it
Uses: app/controllers/NoteController.php
*/
/*Route::resource('notes', 'NoteController');*/

/*
Purpose: Connect UserController to use function inside of it
Uses: app/controllers/UserController.php
*/
Route::resource('users', 'UserController');

/*
Purpose: Process search
Uses: app/controllers/UserController.php
*/
Route::post('search', array('uses' => 'UserController@doSearch'));

/*
Purpose: Process history search
Uses: app/controllers/UserController.php
*/
Route::post('history_search', array('uses' => 'UserController@doHistorySearch'));