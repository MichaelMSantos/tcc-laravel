<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Modelo</th>
                <th scope="col">Tamanho</th>
                <th scope="col">Cor</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (count($camisetas) > 0)
                @foreach ($camisetas as $camiseta)
                    <tr>
                        <th scope="row">{{ $camiseta->codigo }}</th>
                        <th>{{ $camiseta->modelo }}</th>
                        <th>{{ $camiseta->tamanho }}</th>
                        <th>{{ $camiseta->cor }}</th>
                        <th>{{ $camiseta->quantidade }}</th>
                        <th>{{ $camiseta->categoria }}</th>
                        <td class="acoes">
                            <a href="{{ route('camiseta.edit', $camiseta->id) }}" data-bs-toggle="modal"
                                data-bs-target="#update-{{ $camiseta->id }}" class="acao">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $camiseta->id }}">
                                <i class="bi bi-trash"></i>
                            </a>
                            {{-- <a href="{{ route('camiseta.pdf', $camiseta->codigo) }}" target="_blank" class="acao">
                                <i class="bi bi-filetype-pdf"></i>
                            </a> --}}
                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#detalhe-{{ $camiseta->id }}">
                                <i class="bi bi-upc"></i>
                            </a>
                        </td>
                    </tr>

                    @include('estoque.camiseta.camiseta-update', ['camiseta' => $camiseta])
                    @include('estoque.camiseta.camiseta-destroy', ['camiseta' => $camiseta])
                    @include('pages.modal.barcode', ['item' => $camiseta])
                @endforeach
            @else
                <tr>
                    <td colspan="7">Nenhum registro encontrado.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
