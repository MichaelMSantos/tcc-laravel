@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/pouco-estoque.css')

@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pouco Estoque</li>
        </ol>
    </nav>

    <div class="table-responsive">
        <div class="table-header">
            <div class="table-desc">
                <div class="title">
                    Pouco Estoque
                </div>
                <p class="subtitle">
                    Resgistros de vendas feitas por clientes
                </p>
            </div>
            <div class="action">
                <div class="search-box">
                    <span class="icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" id="search" placeholder="Buscar">
                </div>
                <button id="novo">Exportar</button>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"> 000-000-000-00</th>
                <th scope="row"> Teste</th>
                <th scope="row">0</th>
                <th scope="row">Fazer solicitação</th>
                </tr>
            </tbody>
        </table>
        <p class="subtitle">
            Mostrando 0 de 0 registros
        </p>
    </div>
@endsection