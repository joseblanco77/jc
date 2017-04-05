<?php

class CrudController extends BaseController
{

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

    private $productRules = [ ];

    private $customerRules = [ ];


    function __construct()
    {
        $this->productRules  = [
            'productname' => 'required',
            'brand'       => 'required',
            'category'    => 'required',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer'
        ];
        $this->customerRules = [
            'customername' => 'required',
            'email'        => 'required|email'
        ];
    }


    public function showDashboard()
    {
        $user                  = Auth::user();
        $products              = $user->usertype == 1 ? Product::get()->sortBy('name') : [ ];
        $data                  = [
            'user'      => Auth::user(),
            'products'  => $products,
            'customers' => Customer::get()->sortBy('email')
        ];
        $this->layout->content = View::make('dashboard')->with('data', $data);
    }


    public function createPurchase($id)
    {
        $user     = Auth::user();
        $purchase = Purchase::create([ 'customer_id' => $id, 'user_id' => $user->id ]);

        return Redirect::to('purchase/' . $purchase->id);
    }


    public function newPurchase($id)
    {
        $data                  = [
            'user'     => Auth::user(),
            'products' => Product::all()->sortBy('productname')->lists('productname', 'id','price'),
            'purchase' => Purchase::find($id),
            'details'  => Detail::where('purchase_id', '=', $id)->get(),
            'prices' => Product::all()->sortBy('productname')->lists('price', 'id'),
        ];
        $this->layout->content = View::make('purchase')->with('data', $data);
    }


    public function addProduct()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->productRules);
        if ($validator->fails()) {
            return Redirect::to('dashboard')->withErrors($validator, 'products')->withInput();
        }
        Product::create($post);

        return Redirect::to('dashboard');
    }


    public function addCustomer()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->customerRules);
        if ($validator->fails()) {
            return Redirect::to('dashboard')->withErrors($validator, 'customers')->withInput();
        }
        $customer = Customer::create($post);
        Customer::setEmailsCache();

        return Redirect::to('create-purchase/' . $customer->id);
    }


    public function editProduct($id)
    {
        $data                  = [
            'user'    => Auth::user(),
            'product' => Product::find($id)
        ];
        $this->layout->content = View::make('edit-product')->with('data', $data);
    }


    public function editCustomer($id)
    {
        $data                  = [
            'user'     => Auth::user(),
            'customer' => Customer::find($id)
        ];
        $this->layout->content = View::make('edit-customer')->with('data', $data);
    }


    public function updateProduct($id)
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->productRules);
        if ($validator->fails()) {
            return Redirect::to('edit-product/' . $id)->withErrors($validator, 'products')->withInput();
        }
        Product::find($id)->update($post);

        return Redirect::to('dashboard');
    }


    public function updateCustomer($id)
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->customerRules);
        if ($validator->fails()) {
            return Redirect::to('edit-customer/' . $id)->withErrors($validator, 'customers')->withInput();
        }
        Customer::find($id)->update($post);

        return Redirect::to('dashboard');
    }

}
