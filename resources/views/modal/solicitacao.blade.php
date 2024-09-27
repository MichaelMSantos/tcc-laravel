<div class="modal fade" id="solicitacao" tabindex="-1" aria-labelledby="solicitacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solicitacaoModalLabel">Fazer Solicitação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="solicitacaoForm">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var solicitacaoModal = document.getElementById('solicitacaoModal');

        solicitacaoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            // Extrair dados do produto
            var origem = button.getAttribute('data-origem');
            var codigo = button.getAttribute('data-codigo');
            var fornecedor = button.getAttribute('data-fornecedor');

            // Preencher o modal com os dados
            document.getElementById('solicitacaoOrigem').textContent = origem;
            document.getElementById('solicitacaoCodigo').textContent = codigo;
            document.getElementById('solicitacaoFornecedor').textContent = fornecedor;

            // Preencher os campos ocultos para enviar os dados
            document.getElementById('produtoCodigo').value = codigo;
            document.getElementById('produtoOrigem').value = origem;
        });

        // Lidar com o envio da solicitação
        document.getElementById('confirmarSolicitacao').addEventListener('click', function() {
            var form = document.getElementById('solicitacaoForm');
            var quantidadeSolicitada = document.getElementById('quantidadeSolicitada').value;

            if (quantidadeSolicitada && quantidadeSolicitada > 0) {
                // Aqui você pode fazer um AJAX para enviar a solicitação para o servidor
                form.submit();
            } else {
                alert('Por favor, insira uma quantidade válida.');
            }
        });
    });
</script>
