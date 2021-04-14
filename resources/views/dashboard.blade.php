<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Dashboard') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <a href="{{ route('createSong') }}">
                <x-button-icon icon="fas fa-plus">Dodaj piosenkę</x-button-icon>
            </a>
        </div>
    </div>
</x-app-layout>
