@extends('layouts.app')

@section('page-header')
    <h1 class="m-0">Detalhes do Cliente</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
            <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
            <p><strong>CEP:</strong> {{ $cliente->cep }}</p>
            <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
            

            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
