@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vendas</h1>

    <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">Nova Venda</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Data</th>
                <th>Valor Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
            <tr>
                <td>{{ $venda->cliente->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($venda->data)->format('d/m/Y') }}</td>
                <td>R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('vendas.show', $venda->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                    <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Confirma exclusão?')" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
