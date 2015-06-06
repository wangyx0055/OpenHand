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
Route::get('/guidelines', function()
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
Route::get('/statement', function()
{
	return View::make('pages.statement');
});

/*
Purpose: Redirect to contact us page
Uses: app/views/pages/contact.blade.php
*/
Route::get('/contact', function()
{
	return View::make('pages.contact');
});

/*
Purpose: Redirect to get involved page
Uses: app/views/pages/involved.blade.php
*/
Route::get('/involved', function()
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
Route::get('/faq', function()
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
Route::get('/database-add', function()
{
	if (Auth::check()) // if valid user logged in, redirect to database add page
		return View::make('pages.database.add');
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to search data page
Uses: app/views/pages/database/search.blade.php
*/
Route::get('/database-search', function()
{
	$results = '';
	
	if (Auth::check()) // if valid user logged in, redirect to database search page
		return View::make('pages.database.search')
			->with('results', $results);
	else // if valid user is not logged in, redirect to login page
		return View::make('pages.login');
});

/*
Purpose: Redirect to view all data page
Uses: app/views/pages/database/show.blade.php
*/
Route::get('/database-show', function()
{
	$guests = Guest::all();
	
	if (Auth::check()) // if valid user logged in, redirect to database search page
		return View::make('pages.database.show')
			->with('guests', $guests);
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
Route::get('logout', array('uses' => 'VolunteerController@doLogout'));

/*
Purpose: Connect GuestController to use function inside of it
Uses: app/controllers/GuestController.php
*/
Route::resource('guests', 'GuestController');

/*
Purpose: Process search
Uses: app/controllers/VolunteerController.php
*/
Route::post('search', array('uses' => 'VolunteerController@doSearch'));