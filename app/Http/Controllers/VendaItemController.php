<?php

namespace App\Http\Controllers;

use App\Models\VendaItem;
use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;

class VendaItemController extends Controller
{
    public function index()
    {
        $venda_items = VendaItem::with(['venda', 'produto'])->get();
        return view('venda_items.index', compact('venda_items'));
    }

    public function create()
    {
        $vendas = Venda::all();
        $produtos = Produto::all();
        return view('venda_items.create', compact('vendas', 'produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venda_id' => 'required|exists:vendas,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        VendaItem::create($request->all());

        return redirect()->route('venda_items.index')->with('success', 'Item de venda criado com sucesso.');
    }

    public function show(VendaItem $venda_item)
    {
        return view('venda_items.show', compact('venda_item'));
    }

    public function edit(VendaItem $venda_item)
    {
        $vendas = Venda::all();
        $produtos = Produto::all();
        return view('venda_items.edit', compact('venda_item', 'vendas', 'produtos'));
    }

    public function update(Request $request, VendaItem $venda_item)
    {
        $request->validate([
            'venda_id' => 'required|exists:vendas,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
        ]);

        $venda_item->update($request->all());

        return redirect()->route('venda_items.index')->with('success', 'Item de venda atualizado com sucesso.');
    }

    public function destroy(VendaItem $venda_item)
    {
        $venda_item->delete();
        return redirect()->route('venda_items.index')->with('success', 'Item de venda deletado com sucesso.');
    }
}
