<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">CPF</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <th scope="row">{{ $funcionario->cpf }}</th>
                    <th>{{ $funcionario->name }}</th>
                    <th>{{ $funcionario->email }}</th>
                    <td class="acoes">
                        <a href="#" data-bs-toggle="modal"
                            data-bs-target="#update-{{ $funcionario->id }}" class="acao">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" class="modal-trigger acao" data-bs-toggle="modal"
                            data-bs-target="#delete-{{ $funcionario->id }}">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                    </th>
                </tr>
                @include('pages.funcionarios.funcionario-update', ['funcionario' => $funcionario])
                @include('pages.funcionarios.funcionario-destroy', ['funcionario' => $funcionario])
            @endforeach
        </tbody>
    </table>
</div>
