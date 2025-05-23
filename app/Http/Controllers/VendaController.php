<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with('cliente')->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('vendas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data' => 'required|date',
            'valor_total' => 'required|numeric|min:0',
        ]);

        Venda::create($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda criada com sucesso.');
    }

    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        return view('vendas.edit', compact('venda', 'clientes'));
    }

    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data' => 'required|date',
            'valor_total' => 'required|numeric|min:0',
        ]);

        $venda->update($request->all());

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso.');
    }

    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda deletada com sucesso.');
    }
}
