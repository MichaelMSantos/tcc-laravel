<x-guest-layout>
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
                    <div class="info">
                        <div class="checkbox">
                            <input type="checkbox" onclick="togglePassword()"> Mostrar senha
                        </div>
                        <p id="caps">Capslock ativado</p>
                    </div>
                </div>

                <button type="submit">
                    Entrar
                </button>
            </div>
            <div class="">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
        <aside>
            <img src="/images/login-illustrator.svg" alt="">
        </aside>
    </main>
</x-guest-layout>
