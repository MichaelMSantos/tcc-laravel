@extends('dashboard.layouts.layout')
@section('title', 'Camisetas - Estoque')
@section('link', '/css/estoque/camisetas.css')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Estoque</a></li>
            <li class="breadcrumb-item active" aria-current="page">Camisetas</li>
        </ol>
    </nav>

    <div class="cards">
        <div class="card">
            <div class="card-title">
                Total em estoque
            </div>
            <div class="card-body">
                {{ $camisetas->count() }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                Pouco estoque
            </div>
            <div class="card-body">
                {{ $countCamiseta = DB::table('camisetas')->where('quantidade', '<=', 20)->count() }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                Sem estoque
            </div>
            <div class="card-body">
                {{ $semCamiseta = DB::table('camisetas')->where('quantidade', '<', 1)->count() }}
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="table-header">
            <div class="title">
                Camisetas
            </div>
            <div class="button-group">
                <button id="filtrar">Filtrar</button>
                <button id="novo" type="button" data-bs-toggle="modal" data-bs-target="#modalNovaCamiseta">Novo
                    produto</button>
                <button id="exportar">Exportar</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($camisetas as $camiseta)
                    <tr>
                        <th scope="row">{{ $camiseta->codigo }}</th>
                        <th>{{ $camiseta->modelo }}</th>
                        <th>{{ $camiseta->tamanho }}</th>
                        <th>{{ $camiseta->cor }}</th>
                        <th>{{ $camiseta->quantidade }}</th>
                        <th>{{ $camiseta->categoria }}</th>
                        <td>
                            <a href="{{ route('camiseta.edit', $camiseta->codigo) }}" data-bs-toggle="modal"
                                data-bs-target="#updateCamiseta">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="modal-trigger" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $camiseta->codigo }}">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>

                    @include('dashboard.estoque.modal.camiseta-edit', ['camiseta' => $camiseta])
                    @include('dashboard.estoque.modal.camiseta-delete', ['camiseta' => $camiseta])

                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal  --}}
    @include('dashboard.estoque.modal.camiseta-create')
@endsection
