<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy("name")->paginate(20);
        return view("client.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {
        Client::insert($request->validated());
        return redirect("/clientes")->with("success", "Cliente cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        if (empty($client))
            redirect()->back()->withErrors("Cliente não encontrado");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view("client.edit", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientStoreRequest $request)
    {
        Client::findOrFail($request->id)->update($request->all());
        return redirect()->back()->with("success", "Cliente atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return redirect()->back()->with("success", "Cliente excluído com sucesso");
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $clients = Client::where("name", "LIKE", "%{$request->search}%")
            ->orWhere("email", "LIKE", "%{$request->search}%")
            ->orWhere("cpf", "LIKE", "%{$request->search}%")
            ->orderBy("name")
            ->paginate(20);

        return view("client.index", compact("clients", "filters"));
    }
}
