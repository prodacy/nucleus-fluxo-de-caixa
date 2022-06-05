<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Bill;
use App\Models\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Fortaleza');


        $clients = Client::ALl()->count();

        $total_cash_in = Bill::Where('type_id', config('constants.bill.type_id.in') )->join('clients','clients.id','client_id')->where('deleted_at',null)->where('due','<',date('Y-m-d'))->sum('amount');
        $total_cash_out = Bill::Where('type_id', config('constants.bill.type_id.out') )->join('clients','clients.id','client_id')->where('deleted_at',null)->where('due','<',date('Y-m-d'))->sum('amount');

        $total_cash_in_future = Bill::Where('type_id', config('constants.bill.type_id.in') )->join('clients','clients.id','client_id')->where('deleted_at',null)->where('due','>=',date('Y-m-d'))->sum('amount');
        $total_cash_out_future = Bill::Where('type_id', config('constants.bill.type_id.out') )->join('clients','clients.id','client_id')->where('deleted_at',null)->where('due','>=',date('Y-m-d'))->sum('amount');

        $cash_in = [];
        $cash_out = [];

        foreach (Bill::OrderBy('due','ASC')->join('clients','clients.id','client_id')->where('deleted_at',null)->get() as $bill) {

            $date = ucwords( utf8_encode( strftime('%B / %Y',strtotime($bill->due)) ) );

            if(!isset($cash_in[ $date ])){
                $cash_in[ $date ] = 0;
                $cash_out[ $date ] = 0;
            }

            if( $bill->type_id == config('constants.bill.type_id.in') )
                $cash_in[ $date ] += $bill->amount;
            else
                $cash_out[ $date ] += $bill->amount;


        }


        return view('dashboard.index', 
            [
                'clients' => $clients,
                'total_cash_in' => $total_cash_in,
                'total_cash_out' => $total_cash_out,
                'total_cash_in_future' => $total_cash_in_future,
                'total_cash_out_future' => $total_cash_out_future,
                'cash_in' => $cash_in,
                'cash_out' => $cash_out,
            ]
        );
    }
}
