let stream = null;

function startCamera() {
    const video = document.getElementById('preview');
    const cameraCard = document.getElementById('camera-card');
    const cameraText = document.getElementById('camera-text');
    const stopButton = document.getElementById('stop-camera');

    cameraCard.classList.add('active');
    video.style.display = "block";
    cameraText.style.display = "none";
    stopButton.style.display = "block";

    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then((mediaStream) => {
            stream = mediaStream;
            video.srcObject = stream;
            video.play();
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: video
                },
                decoder: {
                    readers: ["code_128_reader"]
                }
            }, (err) => {
                if (err) {
                    console.error(err);
                    return;
                }
                Quagga.start();
            });

            Quagga.onDetected((data) => {
                const code = data.codeResult.code;
                document.getElementById('codigo-consulta').value = `${code}`;
                Quagga.stop();
            });
        })
        .catch((err) => {
            console.error("Erro ao acessar a câmera: ", err);
            alert("Não foi possível acessar a câmera.");
        });
}

function stopCamera() {
    const video = document.getElementById('preview');
    const cameraCard = document.getElementById('camera-card');
    const cameraText = document.getElementById('camera-text');
    const stopButton = document.getElementById('stop-camera');

    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach(track => track.stop());
        stream = null;
    }

    video.style.display = "none";
    cameraText.style.display = "block";
    stopButton.style.display = "none";
    cameraCard.classList.remove('active');
}

document.getElementById('camera-card').addEventListener('click', startCamera);

document.getElementById('stop-camera').addEventListener('click', (event) => {
    event.stopPropagation();
    stopCamera();
    Quagga.stop();
});

function processImage(file) {
    const reader = new FileReader();
    reader.onload = (event) => {
        const img = new Image();
        img.src = event.target.result;
        img.onload = () => {
            const codeReader = new ZXing.BrowserMultiFormatReader();
            codeReader.decodeFromImage(img).then((result) => {
                document.getElementById('codigo-consulta').value = `${result.text}`;
            }).catch(err => {
                document.getElementById('codigo-consulta').value = 'Código não detectado';
            });
        };
    };
    reader.readAsDataURL(file);
}

function applyDnDFIle(el) {
    const beforeUploadEl = el.querySelector(".before-upload");
    const afterUploadEl = el.querySelector(".after-upload");
    const inputFile = el.querySelector("input");
    const imagePreview = el.querySelector(".after-upload img");
    const clearBtn = el.querySelector(".clear-btn");

    function showImagePreview(img) {
        if (img) {
            const blobUrl = URL.createObjectURL(img);
            imagePreview.src = blobUrl;
            afterUploadEl.style.display = "block";
            beforeUploadEl.style.display = "none";
            processImage(img);
        }
    }

    beforeUploadEl.addEventListener("click", (e) => {
        e.preventDefault();
        inputFile.click();
    });

    inputFile.addEventListener("change", (e) => {
        e.preventDefault();
        showImagePreview(e.target.files[0]);
    });

    clearBtn.addEventListener("click", (e) => {
        afterUploadEl.style.display = "none";
        beforeUploadEl.style.display = "flex";
        imagePreview.src = "";
        inputFile.value = "";
        document.getElementById('codigo-consulta').innerText = '';
    });

    beforeUploadEl.addEventListener("dragover", (e) => {
        e.preventDefault();
        el.classList.add("active");
    });

    beforeUploadEl.addEventListener("dragleave", (e) => {
        e.preventDefault();
        el.classList.remove("active");
    });

    beforeUploadEl.addEventListener("drop", (e) => {
        e.preventDefault();
        el.classList.remove("active");
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            showImagePreview(files[0]);
        }
    });
}

applyDnDFIle(document.querySelector(".file-dnd"));
