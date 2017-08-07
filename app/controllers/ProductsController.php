<?php

class ProductsController extends BaseController
{

    private $productRules = [ ];


    function __construct()
    {
        $this->productRules  = [
            'productname' => 'required',
            'brand'       => 'required',
            'category'    => 'required',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer'
        ];
    }

    public function products()
    {
        $user     = Auth::user();
        $products = $user->usertype == 1 ? Product::get()->sortBy('name') : [ ];
        $this->layout->content = View::make('products')->with('products', $products);
    }

    public function addProduct()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->productRules);
        if ($validator->fails()) {
            return Redirect::to('products')->withErrors($validator)->withInput();
        }
        Product::create($post);

        return Redirect::to('products');
    }

    public function editProduct($id)
    {
        if(Auth::user()->usertype!=1){
            unset($this->productRules['quantity']);
        }
        $product =Product::find($id);
        $this->layout->content = View::make('edit-product')->with('product', $product);
    }

    public function updateProduct($id)
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->productRules);
        if ($validator->fails()) {
            return Redirect::to('edit-product/' . $id)->withErrors($validator, 'products')->withInput();
        }
        Product::find($id)->update($post);

        return Redirect::to('products');
    }



}
