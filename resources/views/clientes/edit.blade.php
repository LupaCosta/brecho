@extends('layouts.app')

@section('page-header')
    <h1 class="m-0">Editar Cliente</h1>
@endsection

@section('content')
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" value="{{ $cliente->telefone }}" class="form-control">
        </div>

        <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep', $cliente->cep ?? '') }}">
</div>


        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" value="{{ $cliente->endereco }}" class="form-control">
        </div>

        

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

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
