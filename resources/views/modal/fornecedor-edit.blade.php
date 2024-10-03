<form action="{{ route('fornecedor.update', $fornecedor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="update-{{ $fornecedor->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Fornecedor {{ $fornecedor->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" value="{{ $fornecedor->nome }}">
                    </div>
                    <div class="input-content">
                        <div class="input-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" value="{{ $fornecedor->telefone }}">
                        </div>
                        <div class="input-group">
                            <label for="linkedin">LinkedIn</label>
                            <input name="linkedin" id="linkedin" value="{{ $fornecedor->linkedin }}">
                        </div>
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="endereco">Endereço</label>
                        <input name="endereco" id="endereco" value="{{ $fornecedor->endereco }}">
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="email">Email</label>
                        <input name="email" id="email" value="{{ $fornecedor->email }}">
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="facebook">Facebook</label>
                        <input name="facebook" id="facebook" value="{{ $fornecedor->facebook }}">
                    </div>
                    <div class="input-group" style="margin-top: 10px">
                        <label for="instagram">Instagram</label>
                        <input name="instagram" id="instagram" value="{{ $fornecedor->instagram }}">
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
