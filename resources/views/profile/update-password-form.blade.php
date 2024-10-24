<x-ui.form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-ui.label for="current_password" value="{{ __('Current Password') }}" />
            <x-ui.input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
            <x-ui.input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-ui.label for="password" value="{{ __('New Password') }}" />
            <x-ui.input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
            <x-ui.input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-ui.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-ui.input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-ui.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-ui.action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-ui.action-message>

        <x-ui.button>
            {{ __('Save') }}
        </x-ui.button>
    </x-slot>
</x-ui.form-section>
