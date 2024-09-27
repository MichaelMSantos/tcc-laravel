document.addEventListener('DOMContentLoaded', function() {
    var solicitacaoModal = document.getElementById('solicitacao');

    solicitacaoModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;

        var origem = button.getAttribute('data-origem');
        var codigo = button.getAttribute('data-codigo');
        var fornecedor = button.getAttribute('data-fornecedor');

        document.getElementById('solicitacaoOrigem').textContent = origem;
        document.getElementById('solicitacaoCodigo').textContent = codigo;
        document.getElementById('solicitacaoFornecedor').textContent = fornecedor;

        document.getElementById('produtoCodigo').value = codigo;
        document.getElementById('produtoOrigem').value = origem;
    });

    document.getElementById('confirmarSolicitacao').addEventListener('click', function() {
        var form = document.getElementById('solicitacaoForm');
        var quantidadeSolicitada = document.getElementById('quantidadeSolicitada').value;

        if (quantidadeSolicitada && quantidadeSolicitada > 0) {
            form.submit();
        } else {
            alert('Por favor, insira uma quantidade válida.');
        }
    });
});