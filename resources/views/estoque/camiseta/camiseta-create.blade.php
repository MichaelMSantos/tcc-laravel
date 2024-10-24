<form action="" method="POST">@csrf <div class="modal fade" id="modalNovaCamiseta" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar nova camiseta</h1><button
                        type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"><label for="codigo">Codigo</label>
                    <div class="input-content" style="margin-bottom: 2.1rem">
                        <div style="width: 100%">
                            <input type="text" name="codigo" id="codigo" style="width: 100%;" value="">
                            <p style="font-size: 12px; position: absolute; width: 100%; font-weight: 600 ">Deixe o campo
                                vazio para gerar um código aleatório</p>
                        </div>
                    </div>
                    <div class="input-content">
                        <div class="input-group"><label for="modelo">Modelo</label><input type="text"
                                name="modelo" id="modelo"></div>
                        <div class="option-group">
                            <div class="input-group"><label for="cor">Cor</label><select name="cor"
                                    id="cor">
                                    <option value="Branco">Branco</option>
                                    <option value="Preto">Preto</option>
                                    <option value="Amarelo">Amarelo</option>
                                    <option value="Vermelho">Vermelho</option>
                                </select></div>
                            <div class="input-group"><label for="tamanho">Tamanho</label><select name="tamanho"
                                    id="tamanho">
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="GG">GG</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="input-content">
                        <div class="input-group"><label for="quantidade">Quantidade</label><input type="text"
                                name="quantidade" id="quantidade"></div>
                        <div class="input-group"><label for="categoria">Categoria</label><select name="categoria"
                                id="categoria">
                                <option value="Adulto">Adulto</option>
                                <option value="Jovem">Jovem</option>
                                <option value="Crianças">Criança</option>
                            </select></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button><button type="submit"
                        class="btn btn-primary">Confirmar</button></div>
            </div>
        </div>
    </div>
</form>
