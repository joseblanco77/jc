<?php

class DashboardController extends BaseController
{

    private $detailRules = [ ];


    function __construct()
    {
    }

    public function index()
    {
        $this->layout->content = View::make('dashboard');
    }

}
