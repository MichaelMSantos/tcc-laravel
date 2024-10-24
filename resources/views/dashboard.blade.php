@section('styles', '/css/dashboard/home.css')
@section('title', 'Início')
<x-app-layout>
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
                {{ $adicoesRecentes }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">Sem estoque</div>
            <div class="card-body">
                {{ $semEstoqueTotal }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">Fornecedores cadastrados</div>
            <div class="card-body">
                {{ $totalFornecedores = DB::table('fornecedores')->count() }}
            </div>
        </div>
    </div>
    <section class="recents">
        <p class="title">
            Estoques Recentes
        </p>
        <div class="table-group shadow-sm">
            <a href="/dashboard/exportar-pdf" class="pdf-link" target="_blank">
                <button id="exportar">Exportar</button></a>
            <x-tables.recentes-table :recentes="$recentes" />
        </div>
    </section>
    <x-ui.acesso-rapido :links="$links" />
</x-app-layout>
