<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

use Session;

class ClientController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::All();
        return view('client.index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('client.create');

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
            'nu_document'  => 'required|cpf_cnpj',
        ];

        $messages = [
            'nu_document.required' => '',
            'nu_document.cpf_cnpj' => 'Formato do número do documento inválido. Deve ser um CPF ou CNPJ',
        ];

        $this->validate($request, $rules, $messages);

        if(Client::create($request->all())){
            Session::flash('success','Cliente inserido com sucesso');
            return redirect()->route('admin.client.index');
        }else{
            Session::flash('danger','Falha ao inserir cliente');
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
        $client = Client::findOrFail($id);

        $clients = Client::All();
        $client_types = config('constants.client.types');

        return view('client.edit',['clients'=>$clients,'client_types'=>$client_types,'client'=>$client]);
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
            'nu_document'  => 'required|cpf_cnpj',
        ];

        $messages = [
            'nu_document.required' => '',
            'nu_document.cpf_cnpj' => 'Formato do número do documento inválido. Deve ser um CPF ou CNPJ',
        ];

        $this->validate($request, $rules, $messages);

        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->nu_document = $request->nu_document;

        if($client->save()){
            Session::flash('success','Cliente alterado com sucesso');
            return redirect()->route('admin.client.index');
        }else{
            Session::flash('danger','Falha ao editar cliente');
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

        $client = Client::findOrFail($id);

        if($client->delete()){
            Session::flash('success','Cliente deletado com sucesso');
        }else{
            Session::flash('danger','Falha ao deletar cliente');
        }
        
        return redirect()->back();

    }

}
