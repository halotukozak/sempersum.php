<div class="shadow bg-white dark:bg-gray-600 rounded-lg md:m-auto">
    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 dark:border-gray-600 rounded-lg text-center">
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
    <div class="p-6 sm:px-20 bg-white dark:bg-gray-800 dark:border-gray-600 rounded-lg text-center">
        <span class="text-4xl font-black text-gray-700 dark:text-gray-200">Ostatnio dodane</span>
    </div>
    <div class="p-2 md:p-10 rounded-lg grid grid-cols-1 md:grid-cols-3">
        @foreach ($songs as $song)
            <div class="m-1">
                <a href="{{ $song->path() }}" wire:key="$song->id" class="">
                    <div
                        class="flex max-w-lg h-full mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        @if($song->cover())
                            <img class="w-1/3 object-cover" src="{{$song->cover()}}"
                                 alt="{{ $song->title }}'s cover">
                        @else
                            <div class="w-1/3"></div>
                        @endif
                        <div class="w-2/3 p-4 md:p-4">
                            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $song->title }}</h1>
                            <div class="flex justify-between mt-3 item-center">
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $song->artist ? $song->artist->name : '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a></div>
        @endforeach
    </div>
</div>
