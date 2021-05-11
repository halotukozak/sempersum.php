<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Preferred soundtrack') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your preferred soundtrack.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            @foreach ($options as $option)
                <label>
                    <input type="radio" name="preferredStreamingService" value="{{$option['value']}}"><i class="fab fa-{{$option['value']}}"></i> {{$option['name']}}
                </label>
            @endforeach

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 dark:text-white" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
