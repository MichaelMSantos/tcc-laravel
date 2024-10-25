<x-guest-layout>
    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <x-ui.validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-ui.label for="email" value="{{ __('Email') }}" />
                <x-ui.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password" value="{{ __('Password') }}" />
                <x-ui.input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-ui.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-ui.input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                {!! htmlFormSnippet() !!}

                {{-- @if ($errors->has('g-recaptcha-response') && !$errors->has('password_confirmation'))
                    <p class="text-red-500">
                        {{ __('Invalid ReCaptcha') }}
                    </p>
                @endif --}}
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-ui.button>
                    {{ __('Reset Password') }}
                </x-ui.button>
            </div>
        </form>
    </x-ui.authentication-card>
</x-guest-layout>
