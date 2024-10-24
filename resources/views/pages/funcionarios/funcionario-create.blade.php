<form action="" method="POST">
    @csrf
    <div class="modal fade" id="novoFuncionario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar novo Funcionarios</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="name" id="nome">
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf">
                        </div>
                        <div class="option-group">
                            <div class="input-group">
                                <label for="password">Senha</label>
                                <input name="password" id="password">
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
