@section('title', 'Consultar Produto')
@section('styles', '/css/dashboard/consultas.css')

<x-app-layout>


    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pouco Estoque</li>
        </ol>
    </nav>

    <div class="consultas">
        <div class="barcode-scanner">
            <aside>
                <div class="file-dnd">
                    <label for="upload-image">Carregue sua imagem do código de barras:</label>
                    <input type="file" id="upload-image" accept="image/*">
                    <div class="before-upload">
                        <div>
                            <i class="bi bi-card-image"></i>
                            <h4>Arrastar e soltar arquivo de imagem</h4>
                            <p></p>
                        </div>
                    </div>
                    <div class="after-upload" style="display: none;">
                        <div class="clear-btn">&times;</div>
                        <img src="" alt="Preview" />
                    </div>
                </div>
                <div class="separador">
                    <div class="line"></div>
                    <span>Ou se preferir</span>
                    <div class="line"></div>
                </div>
            </aside>
            <div class="camera-card" id="camera-card">
                <h4 id="camera-text">Clique para iniciar o scanner</h4>
                <video id="preview"></video>
                <button class="stop-camera" id="stop-camera">Desligar scanner</button>
            </div>
        </div>

        <section class="produto">
            <h4>Consultar produto</h4>
            <div class="codigo-input">
                <label for="codigo">Código</label>
                <input type="text" id="codigo-consulta" list="codigos-sugestoes" autocomplete="off">
                <datalist id="codigos-sugestoes">
                    <!-- Sugestões aparecerão aqui -->
                </datalist>
            </div>
            <div class="resultado">
                <!-- Resultados da consulta -->
            </div>
        </section>

    </div>

    <script src="/js/scanner.js"></script>
    <script>
        $(document).ready(function() {
            $('#codigo-consulta').on('keyup', function() {
                var codigo = $(this).val();

                if (codigo.length > 0) {
                    $.ajax({
                        url: "{{ route('consultar.produto') }}",
                        type: 'GET',
                        data: {
                            codigo: codigo
                        },
                        success: function(response) {
                            var resultadoHtml = '';

                            if (response.tipo === 'camiseta') {
                                resultadoHtml += '<p><strong>Modelo:</strong> ' + response
                                    .modelo + '</p>';
                                resultadoHtml += '<p><strong>Tamanho:</strong> ' + response
                                    .tamanho + '</p>';
                                resultadoHtml += '<p><strong>Cor:</strong> ' + response.cor +
                                    '</p>';
                                resultadoHtml += '<p><strong>Quantidade:</strong> ' + response
                                    .quantidade + '</p>';
                                resultadoHtml += '<p><strong>Categoria:</strong> ' + response
                                    .categoria + '</p>';
                            } else if (response.tipo === 'tecido') {
                                resultadoHtml += '<p><strong>Medida:</strong> ' + response
                                    .medida + '</p>';
                                resultadoHtml += '<p><strong>Cor:</strong> ' + response.cor +
                                    '</p>';
                                resultadoHtml += '<p><strong>Quantidade:</strong> ' + response
                                    .quantidade + '</p>';
                            } else if (response.tipo === 'tinta') {
                                resultadoHtml += '<p><strong>Marca:</strong> ' + response
                                    .marca + '</p>';
                                resultadoHtml += '<p><strong>Cor:</strong> ' + response.cor +
                                    '</p>';
                                resultadoHtml += '<p><strong>Quantidade:</strong> ' + response
                                    .quantidade + '</p>';
                                resultadoHtml += '<p><strong>Capacidade:</strong> ' + response
                                    .capacidade + '</p>';
                            }

                            $('.resultado').html(resultadoHtml).css('display', 'flex');
                        },
                        error: function() {
                            $('.resultado').html('<p>Produto não encontrado.</p>').css(
                                'display', 'flex');
                        }
                    });
                } else {
                    $('.resultado').html('').css('display', 'none');
                }
            });
        });

        $(document).ready(function() {
            $('#codigo-consulta').on('input', function() {
                var codigo = $(this).val();

                if (codigo.length > 0) {
                    $.ajax({
                        url: "{{ route('buscar.codigos') }}",
                        type: 'GET',
                        data: {
                            query: codigo
                        },
                        success: function(data) {
                            var options = '';
                            data.forEach(function(codigo) {
                                options += '<option value="' + codigo + '">';
                            });

                            $('#codigos-sugestoes').html(
                                options);
                        },
                        error: function() {
                            $('#codigos-sugestoes').html(
                                '');
                        }
                    });
                } else {
                    $('#codigos-sugestoes').html('');
                }
            });
        });
    </script>


</x-app-layout>
