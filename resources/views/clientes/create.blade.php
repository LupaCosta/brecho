@extends('layouts.app')

@section('page-header')
    <h1 class="m-0">Novo Cliente</h1>
@endsection

@section('content')
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>

        <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep', $cliente->cep ?? '') }}">
</div>


        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control">
        </div>

        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    {{-- Script opcional para preencher via API do ViaCEP --}}
    <script>
        document.getElementById('cep').addEventListener('blur', async function () {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length === 8) {
                const response = await fetch(`/cep/${cep}`);
                if (response.ok) {
                    const data = await response.json();
                    document.getElementById('endereco').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('uf').value = data.uf;
                }
            }
        });
    </script>
@endsection
