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

