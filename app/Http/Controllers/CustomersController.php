<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Requests\CostumerRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::orderBy('created_at')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerRequest $request)
    {
        try {
            Customers::create($request->except('_token', '_method'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro! Por favor entre em contato com o suporte');
        }
        return redirect()->route('clientes.index')->with('success', 'Registro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('customers.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(CostumerRequest $request, $id)
    {
        $customers = Customers::find($id);
        try {
            $customers->update($request->except('_token', '_method'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro! Por favor entre em contato com o suporte');
        }
        return redirect()->route('clientes.index')->with('success', 'Registro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customers::find($id);
        try {
            $customers->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro! Por favor entre em contato com o suporte');
        }
        return redirect()->route('clientes.index')->with('success', 'Registro removido com sucesso');
    }
}
