@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Item de Venda</h1>

    <form action="{{ route('venda_item.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="venda_id" class="form-label">Venda</label>
            <select name="venda_id" class="form-control" required>
                @foreach ($vendas as $venda)
                    <option value="{{ $venda->id }}" {{ $item->venda_id == $venda->id ? 'selected' : '' }}>
                        #{{ $venda->id }} - {{ $venda->cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select name="produto_id" class="form-control" required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ $item->produto_id == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" class="form-control" value="{{ $item->quantidade }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="valor_unitario" class="form-label">Valor Unitário</label>
            <input type="number" name="valor_unitario" class="form-control" value="{{ $item->valor_unitario }}" step="0.01" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('venda_item.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
