@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Itens de Venda</h1>

    <a href="{{ route('venda_items.create') }}" class="btn btn-primary mb-3">Novo Item</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Venda</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venda_items as $item)
            <tr>
                <td>#{{ $item->venda_id }}</td>
                <td>{{ $item->produto->nome }}</td>
                <td>{{ $item->quantidade }}</td>
                <td>R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('venda_items.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('venda_items.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('venda_items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Confirma exclusão?')" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
