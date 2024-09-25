@extends('dashboard.layouts.layout')
@section('title', 'Tecidos - Estoque')
@section('link', '/css/estoque/tecido.css')

@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Estoque</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tecidos</li>
    </ol>
</nav>

<div class="cards">
    <div class="card">
        <div class="card-title">
            Total em estoque
        </div>
        <div class="card-body">
            {{$tecidos->count()}}
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            Pouco estoque
        </div>
        <div class="card-body">
            {{$count = DB::table('tecidos')->where('quantidade', '<', 6)->count()}}
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            Sem estoque
        </div>
        <div class="card-body">
            {{$esgotado = DB::table('tecidos')->where('quantidade', '<', 1)->count()}}
        </div>
    </div>
</div>

<div class="table-responsive">
    <div class="table-header">
        <div class="title">
            Tecidos
        </div>
        <div class="button-group">
            {{-- <button id="filtrar">Filtrar</button> --}}
            <button id="novo" type="button" data-bs-toggle="modal" data-bs-target="#novoTecido">Novo
                produto</button>
            <button id="exportar">Exportar</button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Medidas</th>
                <th scope="col">Cores</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tecidos as $tecido)
                <tr>
                    <th scope="row">{{ $tecido->codigo }}</th>
                    <th>{{ $tecido->medida }}</th>
                    <th>{{ $tecido->cor }}</th>
                    <th>{{ $tecido->quantidade }}</th>
                    <td class="acoes">
                        <a href="#" class="acao" data-bs-toggle="modal" data-bs-target="#update-{{ $tecido->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <a href="#" class="modal-trigger acao" data-bs-toggle="modal" data-bs-target="#delete-{{ $tecido->id }}">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>

                @include('modal.estoque.tecido-edit', ['tecido' => $tecido])
                @include('modal.estoque.tecido-delete', ['tecido' => $tecido])
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal --}}
@include('modal.estoque.tecido-create')

@endsection