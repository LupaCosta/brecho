@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Cliente: {{ $cliente->nome }}</h1>

    <p><strong>Telefone:</strong> {{ $cliente->telefone ?? 'Não informado' }}</p>
    <p><strong>Endereço:</strong> {{ $cliente->endereco ?? 'Não informado' }}</p>

    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
