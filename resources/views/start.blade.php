<x-app-layout>
        <x-slot name="header">
            <h2>
            {{ __('Start') }}
            </h2>
        </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jetstream::welcome />
        </div>
    </div>
</x-app-layout>
