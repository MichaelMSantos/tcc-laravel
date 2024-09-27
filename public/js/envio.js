let produtos = [];
document.getElementById('categoria').addEventListener('change', function() {
    const categoria = this.value;
    const inputProduto = document.getElementById('produto-codigo');
    const sugestoesLista = document.getElementById('sugestoes-produto');
    sugestoesLista.innerHTML = '';
    fetch(`/produtos/${categoria}`)
        .then(response => response.json())
        .then(data => {
            produtos = data;
        });
});
document.getElementById('produto-codigo').addEventListener('input', function() {
    const valorDigitado = this.value.toLowerCase();
    const sugestoesLista = document.getElementById('sugestoes-produto');
    sugestoesLista.innerHTML = '';
    if (valorDigitado === '') return;
    const produtosFiltrados = produtos.filter(produto => produto.codigo.toString().includes(valorDigitado));
    produtosFiltrados.forEach(produto => {
        const item = document.createElement('li');
        item.classList.add('list-group-item');
        let nomeProduto = '';
        if (produto.modelo) {
            nomeProduto = `${produto.modelo} - Tam: ${produto.tamanho} - Cor: ${produto.cor}`;
        } else if (produto.medida) {
            nomeProduto = `${produto.cor} - ${produto.medida}`;
        } else if (produto.capacidade) {
            nomeProduto = `${produto.cor} - ${produto.capacidade}`;
        }
        item.textContent = `${produto.codigo} - ${nomeProduto}`;
        item.addEventListener('click', () => {
            selecionarProduto(produto);
        });
        sugestoesLista.appendChild(item);
    });
});

function selecionarProduto(produto) {
    document.getElementById('produto-id').value = produto.id;
    document.getElementById('produto-codigo').value = produto.codigo;
    document.getElementById('quantidade').placeholder = `Quantidade em estoque: ${produto.quantidade || 'N/A'}`;

    document.getElementById('sugestoes-produto').innerHTML = '';
}