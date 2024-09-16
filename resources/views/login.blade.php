<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body class="antialiased">
    <main>
        <form action="">
            <section>
                <img src="/images/logo.png" alt="">
            </section>
            <div class="input-container">
                <div class="input-group">
                    <label>Email</label>
                    <div>
                        <input type="email">
                        <span>
                            <img src="/images/email.svg" alt="">
                        </span>
                    </div>
                </div>
                <div class="input-group">
                    <label>Senha</label>
                    <div>
                        <input type="password">
                        <span>
                            <img src="/images/lock.svg" alt="">
                        </span>
                    </div>
                </div>
                <a href="/dashboard">
                    <button type="button">
                        Entrar
                    </button>
                </a>
            </div>
        </form>
        <aside>
            <img src="/images/login-illustrator.svg" alt="">
        </aside>
    </main>
</body>

</html>
