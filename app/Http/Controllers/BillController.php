<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bill;
use App\Models\Client;

use Session;

class BillController extends Controller
{
    //
    public function all()
    {
        $bills = Bill::Join('clients','clients.id','client_id')->where('deleted_at',null)->get();
        return view('bill.all',['bills'=>$bills]);
    }

    public function out()
    {
        $bills = Bill::Where('type_id',config('constants.bill.type_id.out'))->join('clients','clients.id','client_id')->where('deleted_at',null)->get();
        return view('bill.out',['bills'=>$bills]);
    }

    public function enter()
    {
        $bills = Bill::Where('type_id',config('constants.bill.type_id.in'))->join('clients','clients.id','client_id')->where('deleted_at',null)->get();
        return view('bill.enter',['bills'=>$bills]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clients = Client::All();
        $bill_types = config('constants.bill.types');

        return view('bill.create',['clients'=>$clients,'bill_types'=>$bill_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'due'  => 'required|date|date_format:Y-m-d|after_or_equal:today',
        ];

        $messages = [
            'due.date' => '',
            'due.date_format' => 'A data de vencimento informado é inválido.<br>',
            'due.after_or_equal' => 'A data de vencimento deve ser hoje ou depois',
        ];

        $this->validate($request, $rules, $messages);

        if(Bill::create($request->all())){
            Session::flash('success','Conta inserida com sucesso');
            return redirect()->route('admin.bill.all');
        }else{
            Session::flash('danger','Falha ao inserir conta');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // not implemented
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::findOrFail($id);

        $clients = Client::All();
        $bill_types = config('constants.bill.types');

        return view('bill.edit',['clients'=>$clients,'bill_types'=>$bill_types,'bill'=>$bill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'due'  => 'required|date|date_format:Y-m-d|after_or_equal:today',
        ];

        $messages = [
            'due.date' => '',
            'due.date_format' => 'A data de vencimento informado é inválido.<br>',
            'due.after_or_equal' => 'A data de vencimento deve ser hoje ou depois',
        ];

        $this->validate($request, $rules, $messages);

        $bill = Bill::findOrFail($id);
        $bill->type_id = $request->type_id;
        $bill->client_id = $request->client_id;
        $bill->due = $request->due;
        $bill->amount = $request->amount;

        if($bill->save()){
            Session::flash('success','Conta alterada com sucesso');
            return redirect()->route('admin.bill.all');
        }else{
            Session::flash('danger','Falha ao editar conta');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $bill = Bill::findOrFail($id);

        if($bill->delete()){
            Session::flash('success','Conta deletada com sucesso');
        }else{
            Session::flash('danger','Falha ao deletar conta');
        }

        return redirect()->back();

    }

}
