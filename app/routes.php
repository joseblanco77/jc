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
	if (Auth::attempt($user))
	{
		return Redirect::intended('dashboard');
	}
	return Redirect::to('/')->with('loginfail', 'Login Failed');;
});

Route::get('/logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/dashboard', 'CrudController@showDashboard');  /*function()
	{
		return View::make('dashboard');
	});                        */

	Route::get('user/profile', function()
	{
		// Has Auth Filter
	});
});
