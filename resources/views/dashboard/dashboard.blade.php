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
                {{ $totalRegistro }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">Adições nos ultimos 7 dias</div>
            <div class="card-body">
                {{$adicoesRecentes}}
            </div>
        </div>
        <div class="card">
            <div class="card-title">Sem estoque</div>
            <div class="card-body">
                {{$semEstoqueTotal}}
            </div>
        </div>
        <div class="card">
            <div class="card-title">Fornecedores cadastrados</div>
            <div class="card-body">
                {{$totalFornecedores = DB::table('fornecedores')->count();}}
            </div>
        </div>
    </div>
    <section class="recents table-responsive">
        <p class="title">
            Estoques Recentes
        </p>
        <div class="table-group shadow-sm">
            <table class="table table-bordered">
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
                    @if (count($recentes) > 0)
                    @foreach ($recentes as $recent)
                        <tr>
                            <td>{{ $recent->codigo }}</td>
                            <td style="text-transform: capitalize">
                                <a href="/dashboard/estoque/{{ $recent->origem }}"> {{ $recent->origem }}</a>
                            </td>
                            <td>{{ $recent->quantidade }}</td>
                            <td>{{ $recent->fornecedor }}</td>
                            <td>{{ \Carbon\Carbon::parse($recent->created_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="6">Nenhum registro encontrado</td></tr>
                @endif
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
