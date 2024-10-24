<x-guest-layout>
    <x-ui.authentication-card>
        <x-slot name="logo">
            <x-ui.authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-ui.validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-ui.label for="password" value="{{ __('Password') }}" />
                <x-ui.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-ui.button class="ms-4">
                    {{ __('Confirm') }}
                </x-ui.button>
            </div>
        </form>
    </x-ui.authentication-card>
</x-guest-layout>
