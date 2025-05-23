@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estoque</h1>

    <form action="{{ route('estoques.update', $estoque->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ $produto->id == $estoque->produto_id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required min="0" step="1" value="{{ $estoque->quantidade }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('estoques.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
