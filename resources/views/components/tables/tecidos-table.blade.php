<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Medidas</th>
                <th scope="col">Cores</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tecidos) > 0)
                @foreach ($tecidos as $tecido)
                    <tr>
                        <th scope="row">{{ $tecido->codigo }}</th>
                        <th>{{ $tecido->medida }}</th>
                        <th>{{ $tecido->cor }}</th>
                        <th>{{ $tecido->quantidade }}</th>
                        <td class="acoes">
                            <a href="#" class="acao" data-bs-toggle="modal"
                                data-bs-target="#update-{{ $tecido->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $tecido->id }}">
                                <i class="bi bi-trash"></i>
                            </a>
                            {{-- <a href="#" class="acao">
                                <i class="bi bi-filetype-pdf"></i>
                            </a> --}}
                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#detalhe-{{ $tecido->id }}">
                                <i class="bi bi-upc"></i>
                            </a>
                        </td>
                    </tr>

                    @include('estoque.tecido.tecido-update', ['tecido' => $tecido])
                    @include('estoque.tecido.tecido-destroy', ['tecido' => $tecido])
                    @include('pages.modal.barcode', ['item' => $tecido])
                @endforeach
            @else
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
