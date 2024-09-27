
<div class="modal fade" id="detalheModal" tabindex="-1" aria-labelledby="detalheModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalheModalLabel">Detalhes do Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Origem:</strong><span id="modalOrigem"></span></p>
                <p><strong>Código:</strong><span id="modalCodigo"></span></p>
                <p><strong>Quantidade:</strong><span id="modalQuantidade"></span></p>
                <p><strong>Fornecedor:</strong><span id="modalFornecedor"></span></p>
                <div id="detalheContent">
                    {{-- Detalhes dinamicos serao exibidos aqui --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/detalhes.js"></script>
