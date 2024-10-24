@section('styles', '/css/dashboard/monitoramento.css')
@section('title', 'Monitoramento')

<x-app-layout>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Monitoramento </li>
        </ol>
    </nav>
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

    <div class="table-group">
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
                    <input type="text" name="search_entradas" id="search_entradas" placeholder="Buscar entradas">
                </div>
                <button id="novo">Exportar</button>
            </div>
        </div>

        <div id="entradas">
            <x-tables.entradas :entradas="$entradas" />
        </div>
        {{ $entradas->links('pagination::bootstrap-5') }}

    </div>

    <div class="table-group">
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
                    <input type="text" name="search" id="search_saidas" placeholder="Buscar">
                </div>
                <button id="novo">Exportar</button>
            </div>
        </div>

        <div id="saidas">
            <x-tables.saidas :saidas="$saidas" />
        </div>
        {{ $saidas->links('pagination::bootstrap-5') }}
    </div>

    <script>
        $(document).ready(function() {
            $('#search_entradas').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('entrada.search') }}",
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#entradas').html(data);
                    }
                });
            });

            $('#search_saidas').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('saida.search') }}",
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#saidas').html(data);
                    }
                });
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myChart');
            const bbl = document.getElementById('categoriasChart');

            var entradasPorMes = @json($entradasPM);
            var totalCamisetas = @json($totalCamisetas);
            var totalTecidos = @json($totalTecidos);
            var totalTintas = @json($totalTintas);
            var saidasPorMes = @json($saidasPM);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto',
                        'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                    ],
                    datasets: [{
                            label: 'Entradas por Mês',
                            data: entradasPorMes, // Dados fixos de entrada
                            borderWidth: 1,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        },
                        {
                            label: 'Saídas por Mês',
                            data: saidasPorMes, // Dados de saída
                            borderWidth: 1,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
</x-app-layout>
