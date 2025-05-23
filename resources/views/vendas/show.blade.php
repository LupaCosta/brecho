@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Venda</h1>

    <div class="mb-3">
        <strong>Cliente:</strong> {{ $venda->cliente->nome }}
    </div>

    <div class="mb-3">
        <strong>Data:</strong> {{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}
    </div>

    <div class="mb-3">
        <strong>Valor Total:</strong> R$ {{ number_format($venda->valor_total, 2, ',', '.') }}
    </div>

    <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
