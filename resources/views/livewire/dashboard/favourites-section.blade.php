<div>
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
