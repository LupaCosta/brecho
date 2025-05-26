<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\VendaItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CepController;

// Rotas auth Breeze
require __DIR__.'/auth.php';

// Rotas protegidas
Route::middleware(['auth'])->group(function () {
    
    // Dashboard com duas rotas
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::resource('categorias', CategoriaController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('estoques', EstoqueController::class);
    Route::resource('vendas', VendaController::class);
    Route::resource('venda_items', VendaItemController::class);
    Route::get('/cep/{cep}', [CepController::class, 'buscar']);
    
});

// Rota home ou dashboard, pode ser algo simples

