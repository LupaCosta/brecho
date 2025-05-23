<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria', 'cliente')->get();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        return view('produtos.create', compact('categorias', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:50',
            'tamanho' => 'nullable|string|max:50',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'categoria_id' => 'required|exists:categorias,id',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso.');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        return view('produtos.edit', compact('produto', 'categorias', 'clientes'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:50',
            'tamanho' => 'nullable|string|max:50',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'categoria_id' => 'required|exists:categorias,id',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso.');
    }
}
