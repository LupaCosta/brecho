@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Small boxes -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProdutos }}</h3>
                    <p>Produtos Cadastrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('produtos.index') }}" class="small-box-footer">
                    Ver Produtos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalVendas }}</h3>
                    <p>Vendas Realizadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('vendas.index') }}" class="small-box-footer">
                    Ver Vendas <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>R$ {{ number_format($totalValorVendas, 2, ',', '.') }}</h3>
                    <p>Total em Vendas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="{{ route('vendas.index') }}" class="small-box-footer">
                    Detalhes <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Últimos Produtos -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Últimos Produtos Cadastrados</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach ($ultimosProdutos as $produto)
                        <li class="item">
                            <div class="product-info">
                                <a href="{{ route('produtos.show', $produto->id) }}" class="product-title">
                                    {{ $produto->nome }}
                                    <span class="badge badge-warning float-right">R$ {{ number_format($produto->valor, 2, ',', '.') }}</span>
                                </a>
                                <span class="product-description">
                                    Criado em {{ $produto->created_at->format('d/m/Y') }}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Últimas Vendas -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Últimas Vendas</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach ($ultimasVendas as $venda)
                        <li class="item">
                            <div class="product-info">
                                <a href="{{ route('vendas.show', $venda->id) }}" class="product-title">
                                    Venda #{{ $venda->id }}
                                    <span class="badge badge-info float-right">R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</span>
                                </a>
                                <span class="product-description">
                                    Data: {{ $venda->created_at->format('d/m/Y H:i') }}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
