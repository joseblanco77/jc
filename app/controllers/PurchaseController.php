<?php

class PurchaseController extends BaseController
{

    private $detailRules = [ ];
    private $purchaseRules = [ ];


    function __construct()
    {
        $this->detailRules   = [
            'product_id'  => 'required|integer',
            'purchase_id' => 'required|integer',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer'
        ];
        $this->purchaseRules   = [
            'invoice'     => 'required|integer',
            'payment'     => 'required'
        ];
    }

    public function purchases()
    {
        $purchases = Purchase::get()->sortBy('created_at',SORT_REGULAR, true);
        $this->layout->content = View::make('purchases')->with('purchases', $purchases);

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
            ->join('users', 'details.user_id', '=', 'users.id')
            ->select([
                'details.id',
                'details.product_id',
                'details.price',
                'details.quantity',
                'products.productname',
                'products.brand',
                'products.category',
                'users.realname'
            ])
            ->where('details.purchase_id','=',$id)
            ->get();
        $data                  = [
            'user'     => Auth::user(),
            'users'    => User::all()->lists('realname','id'),
            'products' => Product::all()->sortBy('productname')->lists('productname', 'id', 'price'),
            'purchase' => Purchase::find($id),
            'details'  => $details,
            'prices'   => Product::all()->sortBy('productname')->lists('price', 'id')
        ];
        $this->layout->content = View::make('purchase')->with('data', $data);
    }

    public function editPurchase($id)
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->purchaseRules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $purchase = Purchase::find($id);
        $purchase->invoice = $post['invoice'];
        $purchase->payment = $post['payment'];
        $purchase->save();
        return Redirect::back();
    }

    public function addDetail()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->detailRules);
        if ($validator->fails()) {
            return Redirect::to('purchase/' . $post['purchase_id'])->withErrors($validator)->withInput();
        }
        $product = Product::find($post['product_id']);
        $product->quantity = (int)$product->quantity - (int)$post['quantity'];
        $product->save();
        Detail::create($post);

        return Redirect::to('purchase/' . $post['purchase_id']);
    }

    public function deleteDetail($id)
    {
        $detail  = Detail::find($id);
        $product = Product::find($detail->product_id);
        $product->quantity = (int)$product->quantity + (int)$detail->quantity;
        $product->save();
        $detail->delete();
        return Redirect::back();
    }


}
