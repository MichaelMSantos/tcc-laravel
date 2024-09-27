@extends('dashboard.layouts.layout')
@section('title', 'Dashboard')
@section('link', '/css/dashboard/admin.css')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
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
    </div>

@endsection
