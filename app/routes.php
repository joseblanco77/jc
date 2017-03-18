<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::post('/login', function()
{
	$user = Input::except('_token');
	//die(var_dump($user));
	if (Auth::attempt($user))
	{
		return Redirect::intended('dashboard');
	}
});

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/dashboard', function()
	{
		return View::make('dashboard');
	});

	Route::get('user/profile', function()
	{
		// Has Auth Filter
	});
});
