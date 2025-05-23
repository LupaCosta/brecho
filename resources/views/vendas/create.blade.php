@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Venda</h1>

    <form action="{{ route('vendas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="" selected disabled>Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data da Venda</label>
            <input type="date" name="data" id="data" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="valor_total" class="form-label">Valor Total</label>
            <input type="number" name="valor_total" id="valor_total" class="form-control" step="0.01" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
