@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/fina.css')

@section('breadcrumb')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Monitoramento </li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="table-responsive">
        <div class="table-header">
            <div class="table-desc">
                <div class="title">
                    Entradas
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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Seção</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <th scope="row">
                            @if ($entrada->historicoable)
                                {{ $entrada->historicoable->codigo ?? $entrada->historicoable->id }}
                            @else
                                N/A
                            @endif
                        </th>
                        <th scope="row">{{ $entrada->created_at->format('d/m/Y') }}</th>
                        <th scope="row">
                            <a href="#">
                                <i class="bi bi-eye"></i> Visualizar
                            </a>
                        </th>
                        <th scope="row">
                            @if (isset($entrada->historicoable->quantidade))
                                {{ $entrada->historicoable->quantidade }}
                            @else
                                Não disponível
                            @endif
                        </th>
                        <th scope="row">
                            {{ class_basename($entrada->historicoable_type) }}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <div class="table-header">
            <div class="table-desc">
                <div class="title">
                    Saídas
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
                    <th scope="col">Seção</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <th scope="row"></th>
                    <th scope="row"></th>
                    <th scope="row"></th>
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
                Comparativo de Entradas e Saídas
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
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myChart');
            const bbl = document.getElementById('categoriasChart');

            var entradasPorMes = @json($entradasPM);
            var totalCamisetas = @json($totalCamisetas);
            var totalTecidos = @json($totalTecidos);
            var totalTintas = @json($totalTintas);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto',
                        'Setembro',
                        'Outubro', 'Novembro', 'Dezembro'
                    ],
                    datasets: [{
                            label: 'Entradas por Mês',
                            data: entradasPorMes,
                            borderWidth: 1,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        },
                        {
                            label: 'Saídas por Mês',
                            data: [0, 5, 3, 5, 3, 0, 2, 10, 6, 5, 2, 0],
                            borderWidth: 1,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        }
                    ]
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

        });
    </script>
@endpush
