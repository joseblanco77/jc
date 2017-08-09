<?php

class CustomersController extends BaseController
{

    private $customerRules = [ ];


    function __construct()
    {
        $this->customerRules = [
            'customername' => 'required',
            'email'        => 'required|email|unique:customers'
        ];
    }

    public function customers()
    {
        $customers = Customer::get()->sortBy('email');
        $this->layout->content = View::make('customers')->with('customers', $customers);
    }

    public function addCustomer()
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->customerRules);
        if ($validator->fails()) {
            return Redirect::to('customers')->withErrors($validator)->withInput();
        }
        $customer = Customer::create($post);

        return Redirect::to('create-purchase/' . $customer->id);
    }

    public function editCustomer($id)
    {
        $customer = Customer::find($id);
        $this->layout->content = View::make('edit-customer')->with('customer', $customer);
    }

    public function updateCustomer($id)
    {
        $post      = Input::except('_token');
        $validator = Validator::make($post, $this->customerRules);
        if ($validator->fails()) {
            return Redirect::to('edit-customer/' . $id)->withErrors($validator)->withInput();
        }
        Customer::find($id)->update($post);

        return Redirect::to('customers');
    }



}
