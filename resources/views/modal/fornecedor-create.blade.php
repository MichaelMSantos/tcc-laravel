<form action="" method="POST">
    @csrf
    <div class="modal fade" id="novoFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar nova camiseta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nome">Nome</label>
                    <div class="input-content">
                        <input type="text" name="codigo" id="codigo">
                        <span> ou </span>
                        <button type="button" id="scanner">Escanear</button>
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone">
                        </div>
                        <div class="option-group">
                            <div class="input-group">
                                <input for="endereco">Endereço</input>
                            </div>
                            <div class="input-group">
                                <label for="contato">Contatos</label>
                                <input name="contato" id="contato">
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