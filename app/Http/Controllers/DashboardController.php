<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalProdutos = Produto::count();
    $totalVendas = Venda::count();
    $totalValorVendas = Venda::sum('valor_total');
    $ultimosProdutos = Produto::orderBy('created_at', 'desc')->limit(5)->get();
    $ultimasVendas = Venda::orderBy('created_at', 'desc')->limit(5)->get();

    return view('dashboard', compact('totalProdutos', 'totalVendas', 'totalValorVendas', 'ultimosProdutos', 'ultimasVendas'));
}
}
