<div class="bg-white rounded-lg shadow-lg dark:bg-gray-800 relative"
     x-data="{show : true,
     hover : false}"
     x-show="show">
    <a href="{{ $song->path() }}">
        <div class="px-4 py-2">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">{{ $song->title }}</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $song->created_at->diffForHumans() }}</p>
        </div>
        @if ($song->artist)
            <img class="object-cover w-full h-48 mt-2"
                 src="{{ $song->artist->avatar() }}"
                 alt="{{ $song->artist->name }}"/>
        @endif
    </a>
    <div class="flex items-center justify-center px-4 py-2 bg-white dark:bg-gray-900 absolute inset-x-0 bottom-0">
        <button
            wire:click="verify({{ $song->id }})"
            @click="show = true"
            @mouseenter="hover = true"
            @mouseleave="hover = false"
            class="z-30 px-2 py-1 text-xs font-semibold text-gray-900 uppercase transition-colors duration-200 transform bg-white rounded hover:bg-gray-200 focus:bg-gray-400 focus:outline-none">
            Zweryfikuj natychmiast<i class="fas fa-check-circle p-1"></i>
        </button>
    </div>
    <div
        x-show="hover"
        class="z-20 absolute left-0 top-0 rounded-lg w-full h-full bg-green-500 bg-opacity-40 text-center animate-pulse">
        <i class="fas fa-plus text-white text-2xl absolute top-1/2 left-1/2"></i>
    </div>
</div>
