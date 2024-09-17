@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/home.css')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Início</li>
        </ol>
    </nav>
    <div class="cards">
        <div class="card">
            <div class="card-title">Total de produtos</div>
            <div class="card-body">
                20
            </div>
        </div>
        <div class="card">
            <div class="card-title">Adições nos ultimos 7 dias</div>
            <div class="card-body">
                20
            </div>
        </div>
        <div class="card">
            <div class="card-title">Sem estoque</div>
            <div class="card-body">
                20
            </div>
        </div>
        <div class="card">
            <div class="card-title">Fornecedores cadastrados</div>
            <div class="card-body">
                20
            </div>
        </div>
    </div>
    <section class="recents table-responsive shadow-sm">
        <p class="title">
            Estoques Recentes
        </p>
        <div class="table-group">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Seção</th>
                        <th scope="col">Qtd</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="acesso-rapido">
        <p class="title">
            Acesso rápido - Estoque
        </p>
        <div class="cards">
            <a href="/dashboard/estoque/camisetas">
                <div class="card-content shadow">
                    <img src="/images/home/shirt.svg" alt="">
                    <span>Camisetas</span>
                </div>
            </a>
            <a href="/dashboard/estoque/tintas">
                <div class="card-content shadow">
                    <img src="/images/home/paint.svg" alt="">
                    <span>Tintas</span>
                </div>
            </a>
            <a href="/dashboard/estoque/tecidos">
                <div class="card-content shadow">
                    <img src="/images/home/tecido.svg" alt="">
                    <span>Tecidos</span>
                </div>
            </a>
            <a href="#">
                <div class="card-content shadow">
                    <img src="/images/home/finance.svg" alt="">
                    <span>Financeiro</span>
                </div>
            </a>
        </div>
    </div>
    </div>
@endsection
