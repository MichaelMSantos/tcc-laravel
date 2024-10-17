<div class="modal fade" id="detalhe-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">BARCODE {{ $item->codigo }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display:flex; justify-content: center; flex-direction: column">
                <img id="barcode-img-{{ $item->codigo }}"
                    src="{{ asset('storage/barcodes/' . $item->codigo . '.png') }}" alt="Barcode"
                    style="padding: 2rem">

                <button class="download-btn" data-code="{{ $item->codigo }}">Baixar Código de Barras</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var downloadButtons = document.querySelectorAll('.download-btn');
        downloadButtons.forEach(function(button) {
            if (!button.dataset.eventAdded) {
                button.addEventListener('click', function() {
                    var productCode = button.getAttribute('data-code');

                    var imgElement = document.getElementById('barcode-img-' + productCode);
                    var imageURL = imgElement.src;

                    fetch(imageURL)
                        .then(response => response.blob())
                        .then(blob => {
                            var url = window.URL.createObjectURL(blob);
                            var a = document.createElement('a');
                            a.style.display = 'none';
                            a.href = url;
                            a.download = productCode + '.png';
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                        })
                        .catch(() => alert('Falha ao baixar a imagem.'));
                });

                button.dataset.eventAdded = true;
            }
        });
    });
</script>
