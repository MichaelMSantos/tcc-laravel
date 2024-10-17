document.addEventListener("DOMContentLoaded", function() {
    $('#modalNovaCamiseta').on('shown.bs.modal', function () {
        document.getElementById('open-camera').addEventListener('click', function() {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#cam'),
                    constraints: {
                        facingMode: "environment",
                        width: 640,
                        height: 480
                    }
                },
                decoder: {
                    readers: ["code_128_reader"],
                    multiple: false
                },
                locate: false
            }, function(err) {
                if (err) {
                    console.log(err);
                    return;
                }
                console.log("Inicialização concluída. Pronto para começar.");
                document.getElementById('cam').style.display = 'flex';
                Quagga.start();
            });
        });

        Quagga.onDetected(function(data) {
            console.log("Código detectado:", data);
            if (data && data.codeResult && data.codeResult.code) {
                var codigoInput = document.getElementById('codigo');
                if (codigoInput && codigoInput.tagName === 'INPUT') {
                    codigoInput.value = data.codeResult.code;
                    codigoInput.dispatchEvent(new Event('input')); // Forçar atualização visual
                    console.log("Campo preenchido com o código:", data.codeResult.code);
                    Quagga.stop();  // Para o scanner após a detecção
                    document.getElementById('cam').style.display = 'none'; // Esconde a câmera
                } else {
                    console.error("Campo de input 'codigo' não encontrado ou não é um input.");
                }
            } else {
                console.log("Código de barras não detectado corretamente.");
            }
        });
    });
});
