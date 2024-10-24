<div class="table-responsive">
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
            @if (count($entradas) > 0)
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
                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#produto-{{ $entrada->id }}">
                                <i class="bi bi-eye"></i> Visualizar
                            </button>
                        </th>
                        <th scope="row">
                            {{ $entrada->quantidade }}
                        </th>
                        <th scope="row">
                            {{ class_basename($entrada->historicoable_type) }}
                        </th>
                    </tr>

                    <!-- Modal -->
                    @include('pages.modal.detalhe-entrada')
                @endforeach
            @else
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
