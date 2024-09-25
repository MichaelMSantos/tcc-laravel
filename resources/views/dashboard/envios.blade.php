@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
9
@section('link', '/css/dashboard/fornecedores.css')

@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fornecedores</li>
    </ol>
</nav>
<div class="table-responsive">
    <div class="table-header">
        <div class="title">
            Envios
        </div>
        <div class="actions">
            <div class="search-box">
                <span class="icon">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="search" id="search" placeholder="Pesquisar fornecedor">
            </div>
            <button id="novo" data-bs-toggle="modal" data-bs-target="#novoFornecedor">
                Novo envio
            </button>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Produtos</th>
                <th scope="col">Data</th>
                <th scope="col">Quantidade</th>
                <th scope="col" style="width: 15%">Açoes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>

                </th>
            </tr>


        </tbody>
    </table>
    <p class="subtitle">
        Mostrando 0 de 0 registros
    </p>
</div>
@endsection