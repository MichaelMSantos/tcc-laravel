@extends('dashboard.layouts.layout')
@section('title', 'Fornecedores')
@section('link', '/css/dashboard/fornecedores.css')

@section('content')
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
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Número</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Email</th>
                    <th scope="col" style="width: 15%">Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <th scope="row">{{ $fornecedor->nome }}</th>
                        <th>{{ $fornecedor->whatsapp }}</th>
                        <th>{{ $fornecedor->endereco }}</th>
                        <th scope="row">
                            {{-- <a href="{{ route('fornecedor.show', $fornecedor->id) }}" data-bs-toggle="modal"
                                data-bs-target="#contato-{{ $fornecedor->id }}" class="contatos">
                                <i class="bi bi-eye"></i> <span>Visualizar</span>
                            </a> --}}
                            {{ $fornecedor->email }}
                        </th>
                        @include('contatos')
                        <th class="acoes">
                            <a href="{{ route('fornecedor.edit', $fornecedor->id) }}" class="acao" data-bs-toggle="modal"
                                data-bs-target="#update-{{ $fornecedor->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $fornecedor->id }}">
                                <i class="bi bi-trash"></i>
                            </a>
                            <a href="#" class="acao" data-bs-toggle="modal" data-bs-target="#">
                                <i class="bi bi-currency-dollar"></i>
                            </a>
                        </th>
                    </tr>
                    @include('modal.fornecedor-edit', ['fornecedor' => $fornecedor])
                    @include('modal.fornecedor-delete', ['fornecedor' => $fornecedor])
                @endforeach
            </tbody>
            @include('modal.fornecedor-create')
        </table>
    </div>
    <p class="subtitle">
        Mostrando {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }} de {{ $fornecedores->total() }}
        registros
    </p>
</div>
@endsection