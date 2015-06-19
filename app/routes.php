<?php

/*
Purpose: Redirect to home page
Uses: app/views/pages/home.blade.php
*/
Route::get('/', function()
{
	return View::make('pages.home');
});

/*
Purpose: Redirect to guidelines page
Uses: app/views/pages/guidelines.blade.php
*/
Route::get('/ministry-guidelines', function()
{
	return View::make('pages.guidelines');
});

/*
Purpose: Redirect to vision page
Uses: app/views/pages/vision.blade.php
*/
Route::get('/vision', function()
{
	return View::make('pages.vision');
});

/*
Purpose: Redirect to statement page
Uses: app/views/pages/statement.blade.php
*/
Route::get('/statement-of-faith', function()
{
	return View::make('pages.statement');
});

/*
Purpose: Redirect to contact us page
Uses: app/views/pages/contact.blade.php
*/
Route::get('/contact-us', function()
{
	return View::make('pages.contact');
});

/*
Purpose: Redirect to get involved page
Uses: app/views/pages/involved.blade.php
*/
Route::get('/get-involved', function()
{
	return View::make('pages.involved');
});

/*
Purpose: Redirect to charter page
Uses: app/views/pages/charter.blade.php
*/
Route::get('/charter', function()
{
	return View::make('pages.charter');
});

/*
Purpose: Redirect to frequently asked questions page
Uses: app/views/pages/faq.blade.php
*/
Route::get('/frequently-asked-questions', function()
{
	return View::make('pages.faq');
});

/*
Purpose: Redirect to volunteer login page
Uses: app/views/pages/login.blade.php
*/
Route::get('/login', function()
{
	return View::make('pages.login');
});

/*
Purpose: Redirect to add to database page
Uses: app/views/pages/database/add.blade.php
*/
Route::get('/database/add', function()
{
	if (Auth::check()) // if valid user logged in, redirect to database add page
		return View::make('pages.database.add');
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to search database page
Uses: app/views/pages/database/search.blade.php
*/
Route::get('/database/search', function()
{
	$results = '';
	
	if (Auth::check()) // if valid user logged in, redirect to database search page
		return View::make('pages.database.search')
			->with('results', $results);
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to view all database page
Uses: app/views/pages/database/show.blade.php
*/
Route::get('/database/show-all', function()
{
	$guests = Guest::all();
	
	if (Auth::check()) // if valid user logged in, redirect to database search page
		return View::make('pages.database.show')
			->with('guests', $guests);
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to view admins view all user page
Uses: app/views/pages/database/admin/show.blade.php
*/
Route::get('/database/admin/show-all', function()
{
	$users = User::all();
	
	if (Auth::check()) // if valid user logged in, redirect to database add page
		return View::make('pages.database.admin.admin-show')
			->with('users', $users);
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to view admins add user page
Uses: app/views/pages/database/admin/add.blade.php
*/
Route::get('/database/admin/add', function()
{
	if (Auth::check()) // if valid user logged in, redirect to database add page
		return View::make('pages.database.admin.admin-add');
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to view admins view edit user page
Uses: app/views/pages/database/admin/edit.blade.php
*/
Route::get('/database/admin/edit', function()
{
	if (Auth::check()) // if valid user logged in, redirect to database add page
		return View::make('pages.database.admin.admin-edit');
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

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
	
	if (Auth::check()) // if valid user logged in, redirect to database search page
		return View::make('pages.database.admin.history')
			->with('years', $stringOfYears);
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Process login
Uses: app/controllers/VolunteerController.php
*/
Route::post('login', array('uses' => 'VolunteerController@doLogin'));

/*
Purpose: Process logout
Uses: app/controllers/VolunteerController.php
*/
Route::get('/logout', array('uses' => 'VolunteerController@doLogout'));

/*
Purpose: Process guest check-in
Uses: app/controllers/GuestController.php
*/
Route::post('guest/{id}/check-in', array('as' => 'guests.checkIn', 'uses' => 'GuestController@checkIn'));

/*
Purpose: Connect GuestController to use function inside of it
Uses: app/controllers/GuestController.php
*/
Route::resource('guests', 'GuestController');

/*
Purpose: Connect VounteerController to use function inside of it
Uses: app/controllers/VolunteerController.php
*/
Route::resource('volunteers', 'VolunteerController');

/*
Purpose: Process search
Uses: app/controllers/VolunteerController.php
*/
Route::post('search', array('uses' => 'VolunteerController@doSearch'));

/*
Purpose: Process history search
Uses: app/controllers/VolunteerController.php
*/
Route::post('history_search', array('uses' => 'VolunteerController@doHistorySearch'));

