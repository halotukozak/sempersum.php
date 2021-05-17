<x-jet-form-section submit="send">
    <x-slot name="title">
        Przypisywanie artysty do profilu
    </x-slot>

    <x-slot name="description">
        Jeśli jesteś artystą i chcesz mieć pełną kontrolę nad swoimi utworami, to podaj tutaj link do profilu na
        Facebooku, nazwę konta na Instagramie lub adres email a my zweryfikujemy Twoją prośbę.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="input" value="Link do konta na Facebooku, nazwa użytkownika na Instagramie lub adres email."/>
            <x-jet-input id="input" type="text" class="mt-1 block w-full" wire:model.defer="input" />
            <x-jet-input-error for="input" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Send.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
