@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos</h1>

    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Novo Produto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Tamanho</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Categoria</th>
                <th>Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->tipo }}</td>
                <td>{{ $produto->tamanho }}</td>
                <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                <td>{{ $produto->status }}</td>
                <td>{{ $produto->categoria->nome ?? '-' }}</td>
                <td>{{ $produto->cliente->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza?')" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
