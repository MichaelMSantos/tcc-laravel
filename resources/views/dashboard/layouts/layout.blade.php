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

    {{-- jQuery e jQuery UI --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



    {{-- CSS Styles --}}
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/css/layout.css">
    @yield('styles')
    <link rel="stylesheet" href="@yield('link')">

    @if (Route::is('funcionarios.index'))
        <link rel="stylesheet" href="{{ asset('css/funcModal.css') }}">
    @elseif (Route::is('fornecedor.index'))
        <link rel="stylesheet" href="{{ asset('css/fornecedoresModal.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    @endif


    {{-- Bootstrap Icon Link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- script cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        (function() {
            const savedTheme = localStorage.getItem('bsTheme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
        })();
    </script>

    @if (Route::is('profile.show'))
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    @endif

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
        <x-sidebar />

        {{-- Main Content --}}
        <div class="wrapper">
            @yield('breadcrumb')
            @stack('graficos')
            @yield('content')

            @if (Route::is('profile.show'))
                {{ $slot }}
            @endif
        </div>
    </main>
    @include('envio')

    {{-- Javascript --}}
    <script src="/js/sidebar.js"></script>

    {{-- Link JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>

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
