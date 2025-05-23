@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Estoque</h1>

    <form action="{{ route('estoques.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                <option value="" selected disabled>Selecione um produto</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required min="0" step="1">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('estoques.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
