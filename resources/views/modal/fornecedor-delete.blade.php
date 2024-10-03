<!-- Modal for deleting camiseta -->
<div id="delete-{{ $fornecedor->id }}" class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">Tem certeza?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="col s12" action="{{ route('fornecedor.delete', $fornecedor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Certeza que deseja excluir o fornecedor: {{ $fornecedor->nome}}?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>