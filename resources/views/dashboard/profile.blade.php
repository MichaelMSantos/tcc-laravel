@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/admin.css')

@section('content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <!DOCTYPE html>
    <html lang="pt-br" data-bs-theme="dark">
    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>

    <body> 
            <div class="cards">
                <div class="card-user card">
                    <h2>Informação de Usuário</h2>
                    <p>Atualize suas informações de usuário</p>
                    <form action="update_user.php" method="POST" class="formulario">
                        <label class="nome">Nome</label>
                        <input type="text" name="nome" value="">
                        <label class="second-label">Email</label>
                        <input type="email" name="email" value="">
                        <button type="submit" id="atualizarNome"> Atualizar </button>
                    </form>
                </div>
                <div class="card-password card">
                    <h2>Senha</h2>
                    <p>Certifique de utilizar uma senha forte para a segurança de sua conta</p>
                    <form action="atualizar_senha.php" method="POST" class="formulario">
                        <label>Senha atual</label>
                        <input type="password" name="senha_atual">
                        <label class="second-label">Nova senha</label>
                        <input type="password" name="nova_senha">
                        <label class="second-label">Confirmar senha</label>
                        <input type="password" name="confirmar_senha">
                        <button type="submit" id="atualizarSenha"> Atualizar </button>
                    </form>
                </div>
                <div class="card-delete card">
                    <h2>Deletar a conta</h2>
                    <p>Atenção! Se excluir sua conta, todas as informações cadastradas serão excluídas de nosso sistema</p>
                    <form id="formExclusao" action="deletar_conta.php" method="POST" class="formulario">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal de confirmação de exclusão -->
        <div class="modal fade" id="confirmacaoExclusao" tabindex="-1" aria-labelledby="confirmacaoExclusaoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmacaoExclusaoLabel">Confirmação de exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="formExclusao" action="deletar_conta.php" method="POST">
                            <button type="submit" class="btn btn-danger" id="btnConfirmarExclusao">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection 