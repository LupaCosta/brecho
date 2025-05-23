@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Estoque</h1>

    <div class="mb-3">
        <strong>Produto:</strong> {{ $estoque->produto->nome }}
    </div>

    <div class="mb-3">
        <strong>Quantidade:</strong> {{ $estoque->quantidade }}
    </div>

    <a href="{{ route('estoques.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('estoques.edit', $estoque->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
