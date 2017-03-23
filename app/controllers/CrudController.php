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

	private $validator = [];

	function __construct()
	{
		$this->productRules = ['productname' => 'required',
			'brand' => 'required',
			'category' => 'required',
			'price' => 'required|numeric',
			'quantity' => 'required|integer'
		];
	}

	public function showDashboard()
	{
		$data = [
			'user' => Auth::user(),
			'products' => Product::get()->sortBy('name')
		];
		$this->layout->content = View::make('dashboard')
			->with('data', $data);
	}

	public function addProduct()
	{
		$post = Input::except('_token');
		$validator = Validator::make($post,$this->productRules);
		if($validator->fails())
		{
			return Redirect::to('dashboard')
                ->withErrors($validator,'products')
                ->withInput();
		}
        Product::create($post);
        return Redirect::to('dashboard');
	}

    public function editProduct($id)
    {
        $data = [
            'user' => Auth::user(),
            'product' => Product::find($id)
        ];
        $this->layout->content = View::make('edit-product')
            ->with('data', $data);
    }

    public function updateProduct($id)
    {
        $post = Input::except('_token');
        $validator = Validator::make($post,$this->productRules);
        if($validator->fails())
        {
            return Redirect::to('edit-product/'.$id)
                ->withErrors($validator,'products')
                ->withInput();
        }
        Product::find($id)->update($post);
        return Redirect::to('dashboard');
    }

}
