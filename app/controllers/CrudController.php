<?php

class CrudController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showDashboard()
	{
		$data = [
			'user' => Auth::user(),
			'products' => Product::get()->sortBy('name')
		];
		//die(var_dump($data));
		$this->layout->content = View::make('dashboard')
			->with('data', $data);
	}

}
