<section class="w-full max-w-2xl px-6 py-4 my-5 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <div class="h-24">
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">{!! $name !!}</h2>
    </div>
    <div class="w-full">
        <form wire:submit.prevent="submit" autocomplete="off">
            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="name">Nazwa</label>

            <input
                wire:model="name"
                id="name"
                class="block w-full px-4 py-2 my-3 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                type="text">
            @error('name')
            <x-jet-input-error for="name">{{ $message }}</x-jet-input-error>
            @enderror

{{--            <input id="photoUpload" type="file" wire:model="photo" class="hidden">--}}
{{--            <label for="photoUpload">Wybierz obrazek</label>--}}
{{--            @if ($photo)--}}
{{--                <img src="{{ $photo->temporaryUrl() }}">--}}
{{--            @endif--}}
{{--            @error('photo') <span class="error">{{ $message }}</span> @enderror--}}

            <label
                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">{{ __('Password') }}</label>

            <input
                wire:model="password"
                class="block w-full px-4 py-2 my-3  text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                type="password" name="password" aria-label="password">
            @error('password')
            <x-jet-input-error for="password">{{ $message }}</x-jet-input-error>
            @enderror

            <div class="w-full mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                       for="comment">Komentarz</label>
                <textarea
                    wire:model="comment"
                    name="comment"
                    id="comment"
                    class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                @error('comment')
                <x-jet-input-error for="comment">{{ $message }}</x-jet-input-error>
                @enderror
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

            <div class="flex justify-center mt-6">
                <button
                    class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</section>
