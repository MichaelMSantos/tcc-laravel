@extends('dashboard.layouts.sidebar')
@section('title', 'Camisetas - Estoque')
@section('link', '/css/estoque/camisetas.css')

@section('content')
<div class="cards">
    <div class="card">
        <div class="card-title">
            Total em estoque
        </div>
        <div class="card-body">
            20
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            Pouco estoque
        </div>
        <div class="card-body">
            20
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            Sem estoque
        </div>
        <div class="card-body">
            20
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
            <button id="novo">Novo produto</button>
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
            <tr>
                <th scope="row">00000</th>
                <th>teste</th>
                <th >G</th>
                <th>teste</th>
                <th>2</th>
                <th>Adulto</th>
            </tr>
            <tr>
                <th scope="row">00000</th>
                <th>teste</th>
                <th >G</th>
                <th>teste</th>
                <th>2</th>
                <th>Adulto</th>
            </tr>
        </tbody>
    </table>
</div>
@endsection