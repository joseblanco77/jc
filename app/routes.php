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

Route::get('/', function () {
	if (Auth::check()) {
		return Redirect::to('dashboard');
	}
	return View::make('login');
});

Route::get('/login', function () {
	return View::make('login');
});

Route::post('/login', function () {
	$user = Input::except('_token');
	if (Auth::attempt($user)) {
		return Redirect::intended('dashboard');
	}

	return Redirect::to('/')->with('loginfail', 'Login Failed');;
});

Route::get('/logout', function () {
	Auth::logout();

	return Redirect::to('/');
});

Route::group([ 'before' => 'auth' ], function () {
	Route::get('dashboard', 'CrudController@showDashboard');

	Route::get('products', 'ProductsController@products');
	Route::post('add-product', 'ProductsController@addProduct');
	Route::get('edit-product/{id}', 'ProductsController@editProduct')->where('id', '[0-9]+');
	Route::post('update-product/{id}',
		[ 'as' => 'update-product', 'uses' => 'ProductsController@updateProduct' ])->where('id', '[0-9]+');


	Route::post('/add-customer', 'CrudController@addCustomer');
	Route::get('/edit-customer/{id}', 'CrudController@editCustomer')->where('id', '[0-9]+');
	Route::post('/update-customer/{id}',
		[ 'as' => 'update-customer', 'uses' => 'CrudController@updateCustomer' ])->where('id', '[0-9]+');

	Route::get('/create-purchase/{id}', 'CrudController@createPurchase')->where('id', '[0-9]+');
	Route::get('/purchase/{id}', 'CrudController@newPurchase')->where('id', '[0-9]+');
    Route::post('/add-detail', 'CrudController@addDetail');

	// Route::get('/delete-product/{id}', 'CrudController@addProduct')->where('id', '[0-9]+');

});
