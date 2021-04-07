<div
    class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 rounded">
    <div>
        <button wire:click="like"
                class="inline align-middle text-center select-none font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline p-2"
                type="submit">
            <i class="h2 {{ $song->isLikedBy(current_user()) ? 'fas' : "far" }} fa-heart"></i>
            <span class="h2 text-gray-700 inline-block p-2">
            {{$likes}}
            </span>
        </button>
    </div>

    <a href="{{ $song->path() }}" class="inline-block py-2 px-4 no-underline">
        <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
            <div class="h4">
                <span class=" inline-block">{{ $song->title }}</span>
            </div>
            <a href="{{ $song->artist->path() }}" class="text-gray-700">{{ $song->artist->name }}</a>
        </div>
    </a>
    <div class="flex-auto p-6">

        @foreach($song->tags as $tag)
            <a href="{{ route('search', ['tag' => $tag->name]) }}"
               class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-teal-500 border-teal-500 hover:bg-teal-500 hover:text-white bg-white hover:bg-teal-600">#{{ $tag->name }}</a>
        @endforeach
    </div>
    <hr>
</div>


