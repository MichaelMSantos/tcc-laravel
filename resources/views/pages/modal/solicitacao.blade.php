<div class="modal fade" id="solicitacao" tabindex="-1" aria-labelledby="solicitacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solicitacaoModalLabel">Fazer Solicitação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="solicitacaoForm" method="POST" action="{{ route('fazer.solicitacao') }}">
                    @csrf
                    <p><strong>Produto:</strong> <span id="solicitacaoOrigem"></span></p>
                    <p><strong>Código:</strong> <span id="solicitacaoCodigo"></span></p>
                    <p><strong>Fornecedor:</strong> <span id="solicitacaoFornecedor"></span></p>

                    <div class="mb-3">
                        <label for="quantidadeSolicitada" class="form-label">Quantidade a solicitar</label>
                        <input type="number" class="form-control" id="quantidadeSolicitada" name="quantidadeSolicitada"
                            required>
                    </div>

                    <input type="hidden" id="produtoCodigo" name="produtoCodigo">
                    <input type="hidden" id="produtoOrigem" name="produtoOrigem">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmarSolicitacao">Confirmar Solicitação</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/solicitacao.js"></script>
