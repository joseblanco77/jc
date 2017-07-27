<?php

class CrudController extends BaseController
{

    private $detailRules = [ ];


    function __construct()
    {
        $this->detailRules   = [
            'product_id'  => 'required|integer',
            'purchase_id' => 'required|integer',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer'
        ];
    }

    public function showDashboard()
    {
        $this->layout->content = View::make('dashboard');
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


}
