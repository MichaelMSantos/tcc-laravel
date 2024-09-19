<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/css/login.css">

    {{-- LINKS CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="antialiased">
    <main>
        <form action="{{ route('user.validate') }}" method="POST">
            @csrf
            <section>
                <img src="/images/logo.png" alt="">
            </section>
            <div class="input-container">
                <div class="input-group">
                    <label>Email</label>
                    <div>
                        <input type="email" name="email" id="email">
                        <span>
                            <img src="/images/email.svg" alt="">
                        </span>
                    </div>
                </div>
                <div class="input-group">
                    <label>Senha</label>
                    <div>
                        <input type="password" name="password" id="password">
                        <span>
                            <img src="/images/lock.svg" alt="">
                        </span>
                    </div>
                </div>

                <button type="submit">
                    Entrar
                </button>

            </div>
        </form>
        <aside>
            <img src="/images/login-illustrator.svg" alt="">
        </aside>
    </main>

    <!-- jQuery e Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Configuração do Toastr -->
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "6000",
        };

        // Exibir os erros ao carregar o DOM
        $(document).ready(function() {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>

</body>

</html>
