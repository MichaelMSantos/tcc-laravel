<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Seção</th>
                <th scope="col">Item</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (count($poucoestoque) > 0)
                @foreach ($poucoestoque as $item)
                    <tr>
                        <th scope="row" style="text-transform:capitalize;">
                            {{ $item->origem }}
                        </th>
                        <th style="display: flex; justify-content:space-between">
                            {{ $item->especifico1 }}
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detalheModal"
                                data-origem="{{ $item->origem }}" data-codigo="{{ $item->codigo }}"
                                data-quantidade="{{ $item->quantidade }}" data-fornecedor="{{ $item->fornecedor }}"
                                data-detalhes="{{ json_encode([$item->especifico1, $item->especifico2, $item->especifico3]) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </th>
                        <th>{{ $item->quantidade }}</th>
                        <th>
                            <a href="#solicitacao" data-bs-toggle="modal" data-origem="{{ $item->origem }}"
                                data-codigo="{{ $item->codigo }}" data-fornecedor="{{ $item->fornecedor }}">
                                Fazer solicitação
                            </a>
                        </th>
                    </tr>
                    @include('pages.modal.solicitacao')
                    @include('pages.modal.detalhe-estoque')
                @endforeach
            @else
                <tr>
                    <td colspan="4">Nenhum registro encontrado.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
