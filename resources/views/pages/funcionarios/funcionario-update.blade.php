<form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="update-{{ $funcionario->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Funcionario {{ $funcionario->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="codigo">Email</label>
                    <div class="input-content">
                        <input type="text" name="email" id="email" value="{{ $funcionario->email }}">
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="modelo">Nome</label>
                            <input type="text" name="name" id="nome" value="{{ $funcionario->name }}">
                        </div>
                        <div class="option-group">
                            <div class="input-group">
                                <label for="CPF">CPF</label>
                                <input name="cpf" id="cpf" value="{{ $funcionario->cpf }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</form>
