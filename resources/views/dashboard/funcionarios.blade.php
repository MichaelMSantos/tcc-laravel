@extends('dashboard.layouts.sidebar')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/func.css')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Funcionarios</li>
        </ol>
    </nav>
    <div class="table-responsive">
        <div class="table-header">
            <div class="table-desc">
                <div class="title">
                    Funcionarios
                </div>
                <p class="subtitle">
                    Registro de funcionarios cadastrados no sistema.
                </p>
            </div>
            <div class="action">
                <div class="search-box">
                    <span class="icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" id="search" placeholder="Buscar">
                </div>
                <button id="novo">Novo Funcionario</button>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"> 000-000-000-00</th>
                <th scope="row"> Teste </th>
                <th scope="row">teste@gmail.com</th>
                <th scope="row"></th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection