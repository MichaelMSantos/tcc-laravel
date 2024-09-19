<form action="" method="POST">
    @csrf
    <div class="modal fade" id="novoFuncionario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar nova Funcionarios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="cpf">CPF</label>
                    <div class="input-content">
                        <input type="text" name="cpf" id="cpf">
                        <span> ou </span>
                        <button type="button" id="scanner">Escanear</button>
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="name" id="nome">
                        </div>
                        <div class="option-group">
                            <div class="input-group">
                                <label for="email">email</label>
                                <input type="email" name="email" id="email">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
    </div>
</form>