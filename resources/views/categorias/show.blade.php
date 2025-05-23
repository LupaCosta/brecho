@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Categoria</h1>

    <p><strong>Nome:</strong> {{ $categoria->nome }}</p>

    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
