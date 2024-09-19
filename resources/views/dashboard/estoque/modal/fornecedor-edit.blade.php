<form action="{{ route('fornecedor.update', $fornecedor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="update-{{ $fornecedor->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Fornecedor {{ $fornecedor->id}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nome">Nome</label>
                    <div class="input-content">
                        <input type="text" name="nome" id="nome" value="{{ $fornecedor->id}}">
                        <span> ou </span>
                        <button type="button" id="scanner">Escanear</button>
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" value="{{ $fornecedor->telefone}}">
                        </div>
                        <div class="option-group">
                            <div class="input-group">
                                <label for="endereco">Endereço</label>
                                <input name="endereco" id="endereco">
                            </div>
                            <div class="input-group">
                                <label for="contato">Contato</label>
                                <input name="contato" id="contato"></input>
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