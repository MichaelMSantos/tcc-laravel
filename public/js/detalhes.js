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