<form action="" method="POST">
    @csrf
    <div class="modal fade" id="novoFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome"">
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="whatsapp">Whatsapp</label>
                            <input name="whatsapp" id="whatsapp">
                        </div>
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="endereco">Endereço</label>
                        <input name="endereco" id="endereco">
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="email">Email</label>
                        <input name="email" id="email">
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
