@extends('dashboard.layouts.sidebar')
@section('title', 'Fornecedores')
@section('link', '/css/dashboard/fornecedores.css')

@section('content')
    <div class="table-responsive">
        <div class="table-header">
            <div class="title">
                Fornecedores
            </div>
            <div class="actions">
                <input type="text" name="search" id="search" placeholder="Pesquisar fornecedor">
                <button id="novo">
                    Novo fornecedor
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Contatos</th>
                    <th scope="col">Açoes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">teste</th>
                    <th scope="row">0000-0000</th>
                    <th scope="row">teste</th>
                    <th scope="row">teste</th>
                    <th scope="row"></th>
                </tr>
            </tbody>
        </table>
        <p class="subtitle">
            Mostrando 0 de 0 registros
        </p>
    </div>
@endsection
