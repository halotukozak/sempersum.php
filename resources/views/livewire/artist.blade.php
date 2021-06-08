<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-2">
        <div class="mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            @if($artist->spotify)
                <img
                    class="object-contain object-center w-full"
                    src="{{ $artist->avatar('lg') }}"
                    alt="avatar">
            @endif
            <div class="flex items-center px-6 py-3 bg-gray-900">
                <h1 class="mx-3 text-lg font-semibold text-white">{{ $artist->name }}</h1>
            </div>

            <div class="px-6 py-4">

                <p class="py-2 text-gray-700 dark:text-gray-400">{{ $artist->description }}</p>

                @if ($artist->website)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->website }}" class="flex">
                            <i class="fas fa-globe text-xl"></i>
                            <h1 class="px-2 text-sm">{{ $artist->website }}</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->facebook)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->facebook }}" class="flex">
                            <i class="fab fa-facebook text-xl"></i>
                            <h1 class="px-2 text-sm">Facebook</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->instagram)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->instagram }}" class="flex">
                            <i class="fab fa-instagram text-xl"></i>
                            <h1 class="px-2 text-sm">Instagram</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->spotify)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->spotify('href') }}" class="flex">
                            <i class="fab fa-spotify text-xl"></i>
                            <h1 class="px-2 text-sm">Spotify</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->deezer)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->deezer }}" class="flex">
                            <i class="fab fa-deezer text-xl"></i>
                            <h1 class="px-2 text-sm">Deezer</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->soundcloud)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->soundcloud }}" class="flex">
                            <i class="fab fa-soundcloud text-xl"></i>
                            <h1 class="px-2 text-sm">SoundCloud</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->youtube)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="{{ $artist->youtube }}" class="flex">
                            <i class="fab fa-youtube text-xl"></i>
                            <h1 class="px-2 text-sm">YouTube</h1>
                        </a>
                    </div>
                @endif

                @if ($artist->email)
                    <div
                        class="flex items-center mt-4 text-gray-600 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition dark:text-gray-300 dark:hover:text-gray-100">
                        <a href="mailto:{{ $artist->email }}" class="flex">
                            <i class="fas fa-envelope text-xl"></i>
                            <h1 class="px-2 text-sm">{{ $artist->email }}</h1>
                        </a>
                    </div>
                @endif

            </div>
        </div>
        <div class="md:col-span-2 mx-auto w-full overflow-hidden bg- rounded-lg shadow-lg">
            @foreach ($songs as $song)
                <a href="{{ $song->path() }}" wire:key="$song->id" class="p-1">
                    <div
                        class="flex max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        @if($song->cover())
                            <img class="w-1/3" src="{{$song->cover()}}" alt="{{ $song->title }}'s cover">
                        @else
                            <div class="w-1/3"></div>
                        @endif
                        <div class="w-2/3 p-4 md:p-4">
                            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $song->title }}</h1>
                            <div class="flex justify-between mt-3 item-center">
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    @foreach ($song->tags as $tag)
                                        #{{ $tag->name }}
                                    @endforeach
                                </p>
                                <p class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">
                                    @if ($song->spotifyId)
                                        <i class="fab fa-spotify"></i>
                                    @endif
                                    @if ($song->deezerId)
                                        <i class="fab fa-deezer"></i>
                                    @endif
                                    @if ($song->youtubeId)
                                        <i class="fab fa-youtube"></i>
                                    @endif
                                    @if ($song->soundcloudId)
                                        <i class="fab fa-soundcloud"></i>
                                    @endif
                                </p>
                            </div>
                        </div>

                    </div>

                </a>
            @endforeach
        </div>
    </div>
    @section('pageTitle', $artist->name)
</div>
