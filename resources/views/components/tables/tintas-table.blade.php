<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Marca</th>
                <th scope="col">Cores</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Capacidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tintas) > 0)
                @foreach ($tintas as $tinta)
                    <tr>
                        <th scope="row">{{ $tinta->codigo }}</th>
                        <th>{{ $tinta->marca }}</th>
                        <th>{{ $tinta->cor }}</th>
                        <th>{{ $tinta->quantidade }}</th>
                        <th>{{ $tinta->capacidade }}</th>
                        <td class="acoes">
                            <a href="#" class="acao" data-bs-toggle="modal"
                                data-bs-target="#update-{{ $tinta->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $tinta->id }}">
                                <i class="bi bi-trash"></i>
                            </a>
                            {{-- <a href="#" class="acao">
                        <i class="bi bi-filetype-pdf"></i>
                    </a> --}}
                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#detalhe-{{ $tinta->id }}">
                                <i class="bi bi-upc"></i>
                            </a>
                        </td>
                    </tr>

                    @include('estoque.tinta.tinta-update', ['tinta' => $tinta])
                    @include('estoque.tinta.tinta-destroy', ['tinta' => $tinta])
                    @include('pages.modal.barcode', ['item' => $tinta])
                @endforeach
            @else
                <tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
