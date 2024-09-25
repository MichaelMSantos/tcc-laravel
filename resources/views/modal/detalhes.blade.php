
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var detalheModal = document.getElementById('detalheModal'); 

        var fieldMapping = {
            'tintas': ['Marca', 'Cor', 'Capacidade'],
            'camisetas': ['Modelo', 'Cor', 'Tamanho'],
            'tecidos': ['Medida', 'Cor']
        };

        detalheModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            var origem = button.getAttribute('data-origem');
            var codigo = button.getAttribute('data-codigo');
            var quantidade = button.getAttribute('data-quantidade');
            var fornecedor = button.getAttribute('data-fornecedor');
            var detalhes = JSON.parse(button.getAttribute('data-detalhes'));

 
            document.getElementById('modalOrigem').textContent = origem;
            document.getElementById('modalCodigo').textContent = codigo;
            document.getElementById('modalQuantidade').textContent = quantidade;
            document.getElementById('modalFornecedor').textContent = fornecedor;

            var modalDetalhes = document.getElementById(
                'detalheContent'); 
            modalDetalhes.innerHTML = '';

            if (fieldMapping[origem]) {
                fieldMapping[origem].forEach(function(label, index) {
                    if (detalhes[index]) {
                        var detailElement = document.createElement('p');
                        detailElement.innerHTML = '<strong>' + label + ':</strong> ' + detalhes[
                            index];
                        modalDetalhes.appendChild(detailElement);
                    }
                });
            }
        });
    });
</script>
