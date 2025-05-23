<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Brechó</span>
    </a>

    <!-- Menu lateral -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Clientes -->
                <li class="nav-item">
                    <a href="{{ route('clientes.index') }}" class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <!-- Produtos -->
                <li class="nav-item">
                    <a href="{{ route('produtos.index') }}" class="nav-link {{ request()->routeIs('produtos.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tshirt"></i>
                        <p>Produtos</p>
                    </a>
                </li>

                <!-- Entradas de Produto -->
                <li class="nav-item">
                    <a href="{{ route('estoques.index') }}" class="nav-link {{ request()->routeIs('estoques.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Estoque</p>
                    </a>
                </li>

                <!-- Vendas -->
                <li class="nav-item">
                    <a href="{{ route('vendas.index') }}" class="nav-link {{ request()->routeIs('vendas.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Vendas</p>
                    </a>
                </li>

                <!-- Itens Vendidos -->
                <li class="nav-item">
                    <a href="{{ route('venda_items.index') }}" class="nav-link {{ request()->routeIs('venda_items.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Itens Vendidos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Categorias</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
