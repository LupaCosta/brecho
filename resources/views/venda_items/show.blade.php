@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Item da Venda</h1>

    <div class="mb-3">
        <strong>Venda:</strong> #{{ $item->venda->id }} - {{ $item->venda->cliente->nome }}
    </div>

    <div class="mb-3">
        <strong>Produto:</strong> {{ $item->produto->nome }}
    </div>

    <div class="mb-3">
        <strong>Quantidade:</strong> {{ $item->quantidade }}
    </div>

    <div class="mb-3">
        <strong>Valor Unitário:</strong> R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}
    </div>

    <a href="{{ route('venda_item.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('venda_item.edit', $item->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
