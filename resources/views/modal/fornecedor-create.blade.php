<form action="" method="POST">
    @csrf
    <div class="modal fade" id="novoFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Fornecedor {{ $fornecedor->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome"">
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone">
                        </div>
                        <div class="input-group">
                            <label for="linkedin">LinkedIn</label>
                            <input name="linkedin" id="linkedin">
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
                    <div class="input-group" style="margin-top: 10px">
                        <label for="facebook">Facebook</label>
                        <input name="facebook" id="facebook">
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="instagram">Instagram</label>
                        <input name="instagram" id="instagram">
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
