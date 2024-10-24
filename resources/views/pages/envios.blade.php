@section('title', 'Envios')
@section('styles', '/css/dashboard/envios.css')

<x-app-layout>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Envios</li>
        </ol>
    </nav>
    <div class="table-group">
        <div class="table-header">
            <div class="title">
                Envios
            </div>
            <div class="actions">
                <div class="search-box">
                    <span class="icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" id="search" placeholder="Pesquisar por código">
                </div>
                <button id="novo" data-bs-toggle="modal" data-bs-target="#modal-envio">
                    Enviar Produto
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Produtos</th>
                        <th scope="col">Data</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col" style="width: 15%">Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enviados as $saida)
                        <tr>
                            <th scope="row">
                                @if ($saida->historicoable)
                                    {{ $saida->historicoable->codigo ?? $saida->historicoable->id }}
                                @else
                                    N/A
                                @endif
                            </th>
                            <th scope="row">
                                <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                    data-bs-target="#produto-{{ $saida->id }}">
                                    <i class="bi bi-eye"></i> Visualizar
                                </button>
                            </th>
                            <th scope="row">{{ $saida->created_at->format('d/m/Y') }}</th>
                            <th scope="row">{{ $saida->quantidade }}</th>
                            <th scope="row">
                                <form action="{{ route('devolver', $saida->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja reverter esse envio?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Devolução</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $enviados->links('pagination::bootstrap-5') }}
    </div>
    @include('pages.modal.enviar')
</x-app-layout>
