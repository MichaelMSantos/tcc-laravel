<div class="modal fade" id="modal-envio" tabindex="-1" aria-labelledby="modalEnvioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEnvioLabel">Enviar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-envio" method="POST" action="{{ route('enviar.produto') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="produto-id" name="produto_id">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select id="categoria" name="categoria" class="form-select" required>
                            <option value="" selected disabled>Escolha a Categoria</option>
                            <option value="Camiseta">Camisetas</option>
                            <option value="Tecido">Tecidos</option>
                            <option value="Tinta">Tintas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="produto-codigo" class="form-label">Código do Produto</label>
                        <input type="text" id="produto-codigo" name="produto_codigo" class="form-control"
                            placeholder="Digite o código do produto" required>
                        <ul id="sugestoes-produto" class="list-group"></ul> <!-- Aqui ficarão as sugestões -->
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade a Enviar</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required
                            min="1" placeholder="Quantidade em estoque: N/A">
                    </div>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/js/envio.js"></script>
<style>
    #sugestoes-produto {
        max-height: 200px;
        overflow-y: auto;
        position: absolute;
        z-index: 1000;
        width: 100%;
        background-color: white;
    }

    [data-bs-theme="dark"] #sugestoes-produto {
        background-color: #1e1e1e;
        color: white;
    }

    #sugestoes-produto li {
        cursor: pointer;
    }
</style>
