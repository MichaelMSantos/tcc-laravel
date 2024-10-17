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
                    <label for="codigo">CPF</label>
                    <div class="input-content">
                        <input type="text" name="cpf" id="cpf" value="{{ $funcionario->cpf }}">
                        <span> ou </span>
                        <button type="button" id="scanner">Escanear</button>
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="modelo">Nome</label>
                            <input type="text" name="nome" id="nome" value="{{ $funcionario->nome }}">
                        </div>
                        <div class="option-group">
                            <div class="input-group">
                                <label for="email">email</label>
                                <input name="email" id="email">

                                </input>
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