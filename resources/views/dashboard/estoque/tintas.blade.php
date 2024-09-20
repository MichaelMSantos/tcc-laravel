@extends('dashboard.layouts.layout')
@section('title', 'Tintas - Estoque')
@section('link', '/css/estoque/tintas.css')

@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Estoque</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tintas</li>
    </ol>
</nav>
<div class="cards">
    <div class="card">
        <div class="card-title">
            Total em estoque
        </div>
        <div class="card-body">
        {{ $tintas->count() }}
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            Pouco estoque
        </div>
        <div class="card-body">
        {{ $counttintas= DB::table('tintas')->where('quantidade', '<=', 20)->count() }}
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            Sem estoque
        </div>
        <div class="card-body">
        {{ $semtintas = DB::table('tintas')->where('quantidade', '<', 1)->count() }}
        </div>
    </div>
</div>

<div class="table-responsive">
    <div class="table-header">
        <div class="title">
            Tintas
        </div>
        <div class="button-group">
            <button id="filtrar">Filtrar</button>
            <button id="novo" type="button" data-bs-toggle="modal" data-bs-target="#modalNovaTinta">Novo
                produto</button>
            <button id="exportar">Exportar</button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Marca</th>
                <th scope="col">Cores</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Capacidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tintas as $tinta)
                <tr>
                    <th scope="row">{{ $tinta->codigo }}</th>
                    <th>{{ $tinta->marca }}</th>
                    <th>{{ $tinta->cor }}</th>
                    <th>{{ $tinta->quantidade }}</th>
                    <th>{{ $tinta->capacidade }}</th>
                    <td>
                        <a href="#" data-bs-toggle="modal"
                            data-bs-target="#update-{{ $tinta->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <a href="#" class="modal-trigger" data-bs-toggle="modal"
                            data-bs-target="#delete-{{ $tinta->id }}">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>

                @include('modal.estoque.tinta-edit', ['tinta' => $tinta])
                @include('modal.estoque.tinta-delete', ['tinta' => $tinta])
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal --}}
@include('modal.estoque.tinta-create')
@endsection