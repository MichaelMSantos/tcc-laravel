<div class="modal fade" id="produto-{{ $saida->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($saida->historicoable)
                    @php
                        $detalhes = $saida->historicoable;
                        $tipo = class_basename($saida->historicoable_type);
                    @endphp
                    <p>Código: {{ $detalhes->codigo ?? 'N/A' }} </p>
                    @if ($tipo === 'Camiseta')
                        <p>Tamanho: {{ $detalhes->tamanho ?? 'N/A' }}</p>
                        <p>Cor: {{ $detalhes->cor ?? 'N/A' }}</p>
                        <p>Categoria: {{ $detalhes->categoria ?? 'N/A' }}</p>
                        <p>Quantidade: {{ $detalhes->quantidade ?? 'N/A' }}</p>
                        <p>Fornecedor: {{ $detalhes->fornecedor->nome ?? 'N/A' }}</p>
                    @elseif ($tipo === 'Tecido')
                        <p>Medida: {{ $detalhes->medida ?? 'N/A' }}</p>
                        <p>Cor: {{ $detalhes->cor ?? 'N/A' }}</p>
                        <p>Quantidade: {{ $detalhes->quantidade ?? 'N/A' }}</p>
                        <p>Fornecedor: {{ $detalhes->fornecedor->nome ?? 'N/A' }}</p>
                    @elseif ($tipo === 'Tinta')
                        <p>Cor: {{ $detalhes->cor ?? 'N/A' }}</p>
                        <p>Capacidade: {{ $detalhes->capacidade ?? 'N/A' }}</p>
                        <p>Quantidade: {{ $detalhes->quantidade ?? 'N/A' }} </p>
                        <p>Fornecedor: {{ $detalhes->fornecedor->nome ?? 'N/A' }}</p>
                    @endif
                @else
                    <p>N/A</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
