<div class="px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16">
    <div class="flex justify-center -mt-16 md:justify-end mb-3">
        @if($song->artist && $song->artist->avatar())
            <a href="{{ $song->artist->path() }}">
                <img class="object-cover w-20 h-20 rounded-full"
                     alt="Artist's avatar."
                     src="{{ $song->artist->avatar('md') }}">
            </a>
        @else
            <div class="object-cover w-20 h-20 rounded-full"></div>
        @endif
    </div>
    <button wire:click="like"
            class="inline-flex -mt-10 align-top focus:outline-none"
            type="submit">
                <span class="text-2xl text-gray-700 inline-block p-2">
                    <i class="text-2xl text-red-800 hover:text-red-7600 {{ $liked ? 'fas' : "far" }} fa-heart"></i>
            {!! $likes == 0 ? '&nbsp;&nbsp;' : $likes !!}
            </span>
    </button>
    <a href="{{ $song->path() }}">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">
            @if ($song->deleted_at)
                <i class="fas fa-ban"></i>
            @endif
            {{ $song->title }}
        </h2>

        <p class="mt-6 text-gray-600 dark:text-gray-200">
            @foreach($song->tags as $tag)
                            <a href="{{ route('start', ['tag' => $tag->name]) }}"/>
                <x-jet-secondary-button class="my-1 font-semibold">{{ $tag->name }}</x-jet-secondary-button>
            @endforeach
        </p>

        <div class="flex justify-end mt-4">
            <object>
                @if($song->artist)
                    <a href="{{ $song->artist->path() }}"
                       class="text-xl font-medium text-indigo-500 dark:text-indigo-300">{{ $song->artist->name }}
                    </a>
                @else
                    <span class="text-xl font-medium text-indigo-500 dark:text-indigo-300">&ensp;
                    </span>
                @endif
            </object>
        </div>
    </a>
</div>

