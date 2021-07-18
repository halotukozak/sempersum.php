<div class="shadow bg-white dark:bg-gray-600 rounded-lg md:m-auto">
    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 dark:border-gray-600 rounded-lg">
        <span class="text-4xl font-black text-gray-700 dark:text-gray-200">Wyszukiwanie</span>
    </div>
    <livewire:search.start/>

    <p class="p-2 md:p-10 text-gray-600 dark:text-gray-200 flex-wrap justify-around text-center">
        @foreach($this->tags as $tag)
            <a href="{{ route('start', ['tag' => $tag->name]) }}">
                <x-jet-secondary-button class="my-1 font-semibold">
                    #{{ $tag->name }}
                </x-jet-secondary-button>
            </a>
        @endforeach
    </p>
</div>
