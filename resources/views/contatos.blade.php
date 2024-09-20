<div class="modal fade" id="contato-{{ $fornecedor->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Email: {{ $fornecedor->email }}</p>
                <p>Instagram: <a href="https://www.{{ $fornecedor->instagram }}">{{ $fornecedor->instagram }}</a></p>
                <p>Linkedin: <a href="https://br.{{ $fornecedor->linkedin }}"> {{$fornecedor->linkedin}}</a></p>
                <p>Facebook: <a href="{{$fornecedor->facebook}}">Link</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
