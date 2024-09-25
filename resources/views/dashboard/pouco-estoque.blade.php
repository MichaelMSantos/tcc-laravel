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
            <div class="title">
                Pouco Estoque
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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Seção</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poucoestoque as $item)
                    <tr>
                        <th scope="row" style="text-transform:capitalize;">
                            {{$item->origem}}
                        </th>
                        <th style="display: flex; justify-content:space-between">
                            {{$item->especifico1}}
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detalheModal"
                                data-origem="{{ $item->origem }}" data-codigo="{{ $item->codigo }}"
                                data-quantidade="{{ $item->quantidade }}" data-fornecedor="{{ $item->fornecedor }}"
                                data-detalhes="{{ json_encode([$item->especifico1, $item->especifico2, $item->especifico3]) }}">

                                <i class="bi bi-eye"></i>
                            </a>
                        </th>
                        <th>{{$item->quantidade}}</th>
                        <th>Fazer Solicitacao</th>
                    </tr>

                    @include('modal.detalhes')
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
