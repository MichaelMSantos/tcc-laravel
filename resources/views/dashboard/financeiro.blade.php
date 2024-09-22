@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/fina.css')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Financeiro</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="table-responsive">
        <div class="table-header">
            <div class="table-desc">
                <div class="title">
                    Registros de entradas / Saídas
                </div>
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Tipos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"> 000-000-000-00</th>
                    <th scope="row">17/09/2024</th>
                    <th scope="row">20</th>
                    <th scope="row">2</th>
                    <th scope="row"></th>
                </tr>
                <tr>
                    <th scope="row"> 000-000-000-00</th>
                    <th scope="row">17/09/2024</th>
                    <th scope="row">20</th>
                    <th scope="row">2</th>
                    <th scope="row"></th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('graficos')
    <div class="graficos">
        <div class="grafico-1">
            <div class="graphLabel">
                Saida/Entrada de produtos
            </div>
            <canvas id="myChart"></canvas>
        </div>
        <div class="grafico-2">
            <div class="graphLabel">
                Produtos cadastrados
            </div>
            <canvas id="categoriasChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        const bbl = document.getElementById('categoriasChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var labels = @json($labels);
        var data = @json($data);
        
        new Chart(bbl, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Registros',
                    data: data,
                    borderWidth: 1
                }]
            },
            
        });
    </script>
@endpush
