<?php

class CrudController extends BaseController
{

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
        $this->detailRules   = [
            'product_id'  => 'required|integer',
            'purchase_id' => 'required|integer',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer'
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
        $details = DB::table('details')
            ->join('products', 'details.product_id', '=', 'products.id')
            ->select([
            'details.id',
            'details.product_id',
            'details.price',
            'details.quantity',
            'products.productname',
            'products.brand',
            'products.category'
        ])
            ->where('details.purchase_id','=',$id)
            ->get();
        $data                  = [
            'user'     => Auth::user(),
            'products' => Product::all()->sortBy('productname')->lists('productname', 'id', 'price'),
            'purchase' => Purchase::find($id),
            'details'  => $details,
            'prices'   => Product::all()->sortBy('productname')->lists('price', 'id'),
        ];
        $this->layout->content = View::make('purchase')->with('data', $data);
    }



    public function addCustomer()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->customerRules);
        if ($validator->fails()) {
            return Redirect::to('dashboard')->withErrors($validator, 'customers')->withInput();
        }
        $customer = Customer::create($post);

        return Redirect::to('create-purchase/' . $customer->id);
    }


    public function addDetail()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->detailRules);
        if ($validator->fails()) {
            return Redirect::to('purchase/' . $post['purchase_id'])->withErrors($validator, 'details')->withInput();
        }
        Detail::create($post);

        return Redirect::to('purchase/' . $post['purchase_id']);
    }



    public function editCustomer($id)
    {
        $data                  = [
            'user'     => Auth::user(),
            'customer' => Customer::find($id)
        ];
        $this->layout->content = View::make('edit-customer')->with('data', $data);
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
