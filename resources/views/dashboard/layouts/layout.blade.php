<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{-- CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- CSS Styles --}}
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="@yield('link')">
    <link rel="stylesheet" href="/css/modal.css">

    {{-- Bootstrap Icon Link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- script cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <main>

        {{-- SCRIPT VLibras --}}
        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>

        {{-- darkModeToggle --}}
        <button class="darkModeSwitch" id="darkModeSwitch">
            <i class="bi bi-moon" id="themeIcon"></i>
        </button>

        {{-- Sidebar Structure --}}
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    {{-- <i class="">
                        <img src="/images/sidebar/menu.svg" alt="" class="menu">
                    </i> --}}
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div class="sidebar-logo" style="position: absolute">
                    <a href="#">StampControl</a>
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
                    <a href="/dashboard/financeiro" class="sidebar-link financeiro">
                        <img src="/images/sidebar/material-symbols_finance-mode-rounded.svg" alt="">
                        <span>Monitoramento</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/dashboard/pouco-estoque" class="sidebar-link pouco-estoque">
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
                <a href="/logout" class="sidebar-link">
                    <img src="/images/sidebar/logout.svg" alt="">
                    <span>log out</span>
                </a>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="wrapper">
            @yield('breadcrumb')
            @stack('graficos')
            @yield('content')
        </div>
    </main>

    {{-- Javascript --}}
    <script src="/js/sidebar.js"></script>

    {{-- Link JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/toggleDarkMode.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "timeOut": "6000",
        };

        $(document).ready(function() {
            // Para mensagens de sucesso
            @if (session('logado'))
                toastr.success("{{ session('logado') }}");
            @elseif (session('sucesso'))
                toastr.success("{{ session('sucesso') }}")
            @endif

            // Para mensagens de erro de validação
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>

</body>

</html>
