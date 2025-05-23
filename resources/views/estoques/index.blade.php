@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estoque</h1>

    <a href="{{ route('estoques.create') }}" class="btn btn-primary mb-3">Adicionar Estoque</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estoques as $estoque)
            <tr>
                <td>{{ $estoque->produto->nome }}</td>
                <td>{{ $estoque->quantidade }}</td>
                <td>
                    <a href="{{ route('estoques.show', $estoque->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                    <a href="{{ route('estoques.edit', $estoque->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('estoques.destroy', $estoque->id) }}" method="POST" style="display:inline-block;">
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
