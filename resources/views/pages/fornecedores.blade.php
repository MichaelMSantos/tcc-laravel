@section('title', 'Fornecedores')
@section('styles', '/css/dashboard/fornecedores.css')
<x-app-layout>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fornecedores</li>
        </ol>
    </nav>
    <div class="table-group">
        <div class="table-header">
            <div class="title">
                Fornecedores
            </div>
            <div class="actions">
                <div class="search-box">
                    <span class="icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" id="search" placeholder="Pesquisar fornecedor">
                </div>
                <button id="novo" data-bs-toggle="modal" data-bs-target="#novoFornecedor">
                    Novo fornecedor
                </button>
            </div>
        </div>
        <x-tables.fornecedores :fornecedores="$fornecedores" />
        {{ $fornecedores->links('pagination::bootstrap-5') }}
    </div>

    @include('pages.fornecedores.fornecedor-create')
</x-app-layout>
