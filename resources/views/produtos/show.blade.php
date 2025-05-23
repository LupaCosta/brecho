@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>

    <p><strong>Nome:</strong> {{ $produto->nome }}</p>
    <p><strong>Tipo:</strong> {{ $produto->tipo }}</p>
    <p><strong>Tamanho:</strong> {{ $produto->tamanho }}</p>
    <p><strong>Valor:</strong> R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ $produto->status }}</p>
    <p><strong>Categoria:</strong> {{ $produto->categoria->nome ?? '-' }}</p>
    <p><strong>Cliente:</strong> {{ $produto->cliente->nome ?? '-' }}</p>

    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
