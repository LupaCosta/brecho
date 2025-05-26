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

    $produto = Produto::findOrFail($request->produto_id);

    // Acha o registro de estoque correspondente
    $estoque = $produto->estoque;

    if (!$estoque || $estoque->quantidade < $request->quantidade) {
        return redirect()->back()->withErrors(['Estoque insuficiente para o produto: ' . $produto->nome]);
    }

    // Reduz o estoque
    $estoque->quantidade -= $request->quantidade;
    $estoque->save();

    // Cria o item de venda
    VendaItem::create($request->all());

    return redirect()->route('venda_items.index')->with('success', 'Item de venda criado e estoque atualizado com sucesso.');
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

    // Quantidade antiga antes da atualização
    $quantidade_antiga = $venda_item->quantidade;
    $produto_antigo_id = $venda_item->produto_id;

    // Se o produto mudou, você deve devolver o estoque ao antigo e descontar do novo
    if ($produto_antigo_id != $request->produto_id) {
        // Repor o estoque do produto anterior
        $produto_antigo = Produto::find($produto_antigo_id);
        $produto_antigo->estoque += $quantidade_antiga;
        $produto_antigo->save();

        // Baixar o estoque do novo produto
        $produto_novo = Produto::find($request->produto_id);
        $produto_novo->estoque -= $request->quantidade;
        $produto_novo->save();
    } else {
        // Produto é o mesmo, ajustar pela diferença
        $diferenca = $request->quantidade - $quantidade_antiga;

        $produto = Produto::with('estoque')->find($request->produto_id);
        $estoque = $produto->estoque;

        if ($estoque) {
            $estoque->quantidade -= $diferenca;
            $estoque->save();
        }

    }

    // Atualiza os dados do item de venda
    $venda_item->update($request->only(['venda_id', 'produto_id', 'quantidade', 'valor_unitario']));

    return redirect()->route('venda_items.index')->with('success', 'Item de venda atualizado com sucesso e estoque ajustado.');
}


    public function destroy(VendaItem $venda_item)
    {
        $venda_item->delete();
        return redirect()->route('venda_items.index')->with('success', 'Item de venda deletado com sucesso.');
    }
}
