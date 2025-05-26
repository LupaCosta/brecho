@extends('layouts.app')

@section('page-header')
    <h1 class="m-0">Clientes</h1>
@endsection

@section('content')
    <a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle"></i> Novo Cliente
    </a>

    @if($clientes->isEmpty())
        <div class="alert alert-info">Nenhum cliente cadastrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CEP</th>
                        <th>Endereço</th>
                        
                        <th style="width: 180px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->cep }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Deseja realmente excluir este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
