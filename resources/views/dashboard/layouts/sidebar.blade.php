<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- CSS Styles --}}
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="@yield('link')">

    {{-- Bootstrap Icon Link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    @yield('modalContent')
    <main>
        {{-- Sidebar Structure --}}
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="">
                        <img src="/images/sidebar/menu.svg" alt="" class="menu">
                    </i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">LOGO</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="/dashboard" class="sidebar-link home">
                        <img src="/images/sidebar/home.svg" alt="">
                        <span>Início</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown estoque" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <img class="loge" src="/images/sidebar/system-uicons_box.svg" alt="false">
                        <span>Estoque</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="/dashboard/estoque/camisetas" class="sidebar-link camisetas">Camisetas</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/dashboard/estoque/tintas" class="sidebar-link tintas">Tintas</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/dashboard/estoque/tecidos" class="sidebar-link tecidos">Tecidos</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="../financeiro/index.php" class="sidebar-link">
                        <img src="/images/sidebar/material-symbols_finance-mode-rounded.svg" alt="">
                        <span>Financeiro</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../poucoestoque/index.php" class="sidebar-link">
                        <img src="/images/sidebar/healthicons_stock-out-outline.svg" alt="">
                        <span>Pouco esotque</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dashboard/funcionarios" class="sidebar-link administradores">
                        <img src="/images/sidebar/clarity_administrator-line.svg" alt="">
                        <span>Administradores</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dashboard/fornecedores" class="sidebar-link fornecedores">
                        <img src="/images/sidebar/fornecedores.svg" alt="">
                        <span>Forncedores</span>
                    </a>
                </li>
                </a>
                </li>
            </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <img src="/images/sidebar/backup.svg" alt="">
                    <span>Backup</span>
                </a>
            </li>
            <div class="divisor">
                <hr>
            </div>
            </ul>
            <div class="sidebar-footer">
                <a href="/" class="sidebar-link">
                    <img src="/images/sidebar/logout.svg" alt="">
                    <span>log out</span>
                </a>
            </div>
        </aside>

        {{-- Main Content  --}}
        <div class="wrapper">
            @yield('content')
        </div>
    </main>
</body>
<script src="/js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
