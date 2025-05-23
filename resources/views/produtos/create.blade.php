@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tamanho">Tamanho</label>
            <input type="text" name="tamanho" id="tamanho" class="form-control" value="{{ old('tamanho') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                <option value="">Selecione a categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Selecione o cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
