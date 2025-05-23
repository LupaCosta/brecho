<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoques = Estoque::with('produto')->get();
        return view('estoques.index', compact('estoques'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('estoques.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:0',
        ]);

        Estoque::create($request->all());

        return redirect()->route('estoques.index')->with('success', 'Estoque criado com sucesso.');
    }

    public function show(Estoque $estoque)
    {
        return view('estoques.show', compact('estoque'));
    }

    public function edit(Estoque $estoque)
    {
        $produtos = Produto::all();
        return view('estoques.edit', compact('estoque', 'produtos'));
    }

    public function update(Request $request, Estoque $estoque)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:0',
        ]);

        $estoque->update($request->all());

        return redirect()->route('estoques.index')->with('success', 'Estoque atualizado com sucesso.');
    }

    public function destroy(Estoque $estoque)
    {
        $estoque->delete();
        return redirect()->route('estoques.index')->with('success', 'Estoque deletado com sucesso.');
    }
}
