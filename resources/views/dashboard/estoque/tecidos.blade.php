@extends('dashboard.layouts.sidebar')
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
            Tecidos
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
                <th scope="col">Medidas</th>
                <th scope="col">Cores</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">00000</th>
                <th>teste</th>
                <th>G</th>
                <th>teste</th>
                <th>2</th>
                <th><i class="bi bi-pencil-square"></i>
                    <i class="bi bi-trash3"></i>
                </th>
            </tr>
            <tr>
                <th scope="row">00000</th>
                <th>teste</th>
                <th>G</th>
                <th>teste</th>
                <th>2</th>
                <th><i class="bi bi-pencil-square"></i>
                    <i class="bi bi-trash3"></i>
                </th>
            </tr>
        </tbody>
    </table>
</div>

{{-- Modal --}}

<div class="modal fade" id="modalNovaCamiseta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar nova camiseta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="codigo">Codigo</label>
                <div class="input-content">
                    <input type="text" name="codigo" id="codigo">
                    <span> ou </span>
                    <button type="button">Escanear</button>
                </div>
                <div class="input-content">
                    <div class="input-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo">
                    </div>
                    <div class="option-group">
                        <div class="input-group">
                            <label for="cor">Cor</label>
                            <select name="cor" id="cor">
                                <option value="">Branco</option>
                                <option value="">Preto</option>
                                <option value="">Amarelo</option>
                                <option value="">Vermelho</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="tamanho">Tamanho</label>
                            <select name="tamanho" id="tamanho">
                                <option value="">P</option>
                                <option value="">M</option>
                                <option value="">G</option>
                                <option value="">GG</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-content">
                    <div class="input-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" name="quantidade" id="quantidade">
                    </div>
                    <div class="input-group">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria">
                            <option value="">Adulto</option>
                            <option value="">Jovem</option>
                            <option value="">Criança</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
@endsection