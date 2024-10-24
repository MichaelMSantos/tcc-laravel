@section('styles', '/css/estoque/tecido.css')
@section('title', 'Tecidos')

<x-app-layout>

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
                {{ $tecidos->count() }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                Pouco estoque
            </div>
            <div class="card-body">
                {{ DB::table('tecidos')->where('quantidade', '<', 6)->count() }}
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                Sem estoque
            </div>
            <div class="card-body">
                {{ DB::table('tecidos')->where('quantidade', '<', 1)->count() }}
            </div>
        </div>
    </div>

    <div class="table-group">
        <div class="table-header">
            <div class="title">
                Tecidos
            </div>
            <div class="button-group">
                <button id="novo" type="button" data-bs-toggle="modal" data-bs-target="#novoTecido">Novo
                    produto</button>
                <button id="exportar">Exportar</button>
            </div>
        </div>

        <input type="text" id="pesquisar" placeholder="Pesquisar tecidos..." class="form-control mb-3">

        <div id="resultado-tecidos">
            <x-tables.tecidos-table :tecidos="$tecidos" />
        </div>
        {{ $tecidos->links('pagination::bootstrap-5') }}
    </div>

    {{-- Modal --}}
    @include('estoque.tecido.tecido-create')


    <script>
        $(document).ready(function() {
            $('#pesquisar').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('tecido.search') }}",
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#resultado-tecidos').html(data);
                    }
                });
            });
        });
    </script>
</x-app-layout>
