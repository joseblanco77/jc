<?php

use Carbon\Carbon;

class ReportController extends BaseController
{

    private $detailRules = [ ];


    function __construct()
    {
    }

    public function index()
    {
        if(Auth::user()->usertype!=1) {
            return Redirect::to('/');
        }
        $users = User::where('usertype', 2)->lists('realname', 'id');
        $this->layout->content = View::make('reports-index')->with('users',$users);
    }

    public function show()
    {
        if(Auth::user()->usertype!=1) {
            return Redirect::to('/');
        }
        $post   = Input::except('_token');
        $report = $this->generate($post);
        $this->layout->content = View::make('reports-show')->with('report',$report);
    }

    private function generate($post)
    {
        if(Auth::user()->usertype!=1) {
            return Redirect::to('/');
        }
        $report = [];
        $details = Detail::with('Product')->with('User')->with('Customer'); //DB::table('details');

        $report['vendedor'] = 'Todos los vendedores';

        if($post['user']!=='todos') {
            $details = $details->where('details.user_id',$post['user']);
            $user = User::find($post['user']);
            $report['Vendedor'] = $user->realname;
        }


        $ini = date('Y-m-d', strtotime(Input::get('date_ini'))) . ' 00:00:00';
        $end = date('Y-m-d', strtotime(Input::get('date_end'))) . ' 23:59:59';
        $report['data']   = $details->whereBetween('details.created_at', [$ini, $end])
                                    ->orderBy('details.created_at','asc')
                                    ->get();

        return $report;
    }

}
