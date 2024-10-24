<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Whatsapp</th>
                <th scope="col">Endereço</th>
                <th scope="col">Email</th>
                <th scope="col" style="width: 15%">Açoes</th>
            </tr>
        </thead>
        <tbody>
            @if (count($fornecedores) > 0)
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <th scope="row">{{ $fornecedor->nome }}</th>
                        <th>{{ $fornecedor->whatsapp }}</th>
                        <th>{{ $fornecedor->endereco }}</th>
                        <th scope="row">
                            {{ $fornecedor->email }}
                        </th>
                        @include('pages.modal.contatos')
                        <th class="acoes">
                            <a href="#" class="acao" data-bs-toggle="modal"
                                data-bs-target="#update-{{ $fornecedor->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $fornecedor->id }}">
                                <i class="bi bi-trash"></i>
                            </a>
                            <a href="#" class="acao" data-bs-toggle="modal" data-bs-target="#">
                                <i class="bi bi-currency-dollar"></i>
                            </a>
                        </th>
                    </tr>
                    @include('pages.fornecedores.fornecedor-update', ['fornecedor' => $fornecedor])
                    @include('pages.fornecedores.fornecedor-destroy', ['fornecedor' => $fornecedor])
                @endforeach
            @else
                <tr>
                    <td colspan="5">Nenhum registro encontrado.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
