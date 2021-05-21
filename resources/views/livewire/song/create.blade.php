<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow bg-white dark:bg-gray-600 rounded-lg mx-3 md:m-auto">
            <div
                class="px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16 border-2 dark:border-blue-400 dark:border-opacity-75">
                <div class="flex justify-center -mt-16 md:justify-end mb-3 ">
                    @if(isset($artist) && ($artist->avatar() != null))
                        <img
                            class="object-cover w-32 h-32 rounded-full border-2 dark:border-blue-400 dark:border-opacity-75"
                            alt="Artist's avatar."
                            src="{{ $artist->avatar() }}">
                    @else
                        <div
                            class="bg-blue-400 rounded-full w-32 h-32 border-2 dark:border-blue-400 dark:border-opacity-75">
                        </div>
                    @endif
                </div>
                <div class="inline-flex -mt-10 align-top">
                <span class="text-2xl text-gray-700 inline-block p-2">
                    <i class="text-2xl text-red-800 hover:text-red-7600 fas fa-heart"></i>
            </span>
                </div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">{!! $title ? $title : '&nbsp;' !!}</h2>
                <p class="mt-6 text-gray-600 dark:text-gray-200">
                    @if(!empty($tags))
                        @foreach($tags as $tag)
                            <x-jet-secondary-button wire:key="{{ $loop->index }}" class="my-1 font-semibold">
                                #{{ $tag['name'] }}</x-jet-secondary-button>
                        @endforeach
                    @endif
                </p>
                <div class="flex justify-end mt-4">
                    <span
                        class="text-xl font-medium text-indigo-500 dark:text-indigo-300">{!! $artist ? $artist->name : "&nbsp;" !!}
                    </span>
                </div>
            </div>
            <div class="flex justify-center md:justify-start space-x-2 my-1 px-1 md:px-6 md:py-2 flex-wrap">
                @if(!$choice)
                    <section class="w-full p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
                        <form wire:submit.prevent="save" autocomplete="off">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div class="col-span-full">
                                    <label class="text-gray-700 dark:text-gray-200 text-xl text-semibold select-none">Łatwe
                                        dodawanie
                                        piosenek za
                                        pomocą Spotify <i class="fab fa-spotify p-1"></i></label>
                                    <br/>
                                    <livewire:input.spotify name="spotifyId" :spotify-id="$spotifyId"/>
                                    <p class="text-red-500 text-sm p-1 font-semibold">@error('spotifyId'){{ $message }}@enderror</p>

                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="title">Tytuł <span
                                            class="text-red-700"  {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>

                                    <input wire:model="title" id="title" type="text" placeholder="Wpisz tytuł..."
                                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                                       dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                       focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                       disabled:bg-gray-100 disabled:dark:bg-gray-100"
                                           @if($spotifyId != null) disabled @endif>
                                    <p class="text-red-500 text-sm p-1 font-semibold">@error('title'){{ $message }}@enderror</p>
                                </div>
                                <div>
                                    <label
                                        class="text-gray-700 dark:text-gray-200"
                                        for="artist">Artysta
                                    </label>
                                    <livewire:input.artist name="artist" :disabled="$spotifyId != null" :spotify-id="$spotifyId" :artist="$artist"/>
                                    <p class="text-red-500 text-sm p-1 font-semibold">@error('artist'){{ $message }}@enderror</p>

                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="key">Klucz <span
                                        class="text-red-700"  {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>
                                <livewire:input.select name="key" :options="$keys" :default="$key" placeholder="Wybierz klucz..."/>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('key'){{ $message }}@enderror</p>

                            </div>
                            <div class="col-span-full">
                                <label for="text"
                                       class="text-gray-700 dark:text-gray-200">
                                    Tekst piosenki <span class="text-red-700" {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>
                                <textarea
                                    wire:model="text"
                                    wire:ignore
                                    id="text"
                                    x-data="{ resize: () => { $el.style.height = '500px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                    x-init="resize()"
                                    @input="resize()"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                                rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                focus:border-blue-500 dark:focus:border-blue-500
                                focus:outline-none focus:ring font-mono resize-none overflow-hidden"
                                ></textarea>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('text'){{ $message }}@enderror</p>
                            </div>
                            <div x-data="{ open : false }" @click.away="open = false">
                                <label for="tags"
                                       class="text-gray-700 dark:text-gray-200">
                                    Tagi</label>
                                <input @click="open = true"
                                       wire:model.debounce.500ms="tagTerm"
                                       id="tags" type="text" placeholder="Wpisz tagi..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                                       dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                       focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                       disabled:bg-gray-100 disabled:dark:bg-gray-100"/>
                                <div x-show="open && $wire.tagTerm">
                                    @if($tagTerm)<div>
                                        @foreach($tagOptions as $tagOption)
                                            <div wire:key="{{ $loop->index }}"
                                                 @click="open = false"
                                                 wire:click="addTag('{{$tagOption->name}}')"
                                                 class="block z-10 bg-white w-full rounded-t-none shadow-lg cursor-pointer dark:bg-gray-800">
                                                    <span
                                                        class="flex items-center z-10 bg-white w-full rounded-t-none shadow-lg p-4 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 @if ($loop->last) rounded-b-md @endif">
                                                        <span class="ml-3 block truncate dark:text-gray-50">
                                                            #{{ $tagOption->name }}
                                                        </span>
                                                            <span
                                                                class="ml-3 text-gray-50">
                                                                {{ count($tagOption->songs) }}
                                                            </span>
                                                    </span>
                                            </div>
                                            @if ($loop->index == 10)
                                                @break
                                            @endif
                                        @endforeach
                                </div>
                                    @endif
                                </div>
                                @if(!empty($tags))
                                    <div>
                                        @foreach ($tags as $tag)
                                            <div
                                                wire:click="removeTag('{{$tag['id']}}')" wire:key="{{$tag['id']}}"
                                                class="bg-gray-100 dark:bg-gray-600 inline-flex items-center text-sm rounded mt-2 mr-1">
                                                <span
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    #{{ $tag['name'] }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="deezerId">Link do Deezer<i
                                        class="fab fa-deezer p-1"></i></label>
                                <livewire:input.deezer id="deezerId" type="text" :input="$deezerId"/>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('deezerId'){{ $message }}@enderror</p>

                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="youtubeId">Link do YouTube<i
                                        class="fab fa-youtube p-1"></i></label>
                                <input wire:model.debounce.500ms="youtubeId" id="youtubeId" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"/>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('youtubeId'){{ $message }}@enderror</p>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="soundcloudId">Link do SoundCloud<i
                                        class="fab fa-soundcloud p-1"></i></label>
                                <input wire:model.debounce.500ms="soundcloudId" id="soundcloudId" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('soundcloudId'){{ $message }}@enderror</p>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button
                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                    {{__('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="dark:text-white p-2">
                        <ul class="shadow-box space-y-2">
                            @if($youtubeId && !$errors->has('youtubeId'))
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button"
                                            class="w-full px-8 py-6 text-left shadow rounded-md bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">YouTube<i class="fab fa-youtube px-2"></i></span>
                                        </div>
                                    </button>

                                    <div class="relative overflow-hidden transition-all h-full duration-700">
                                        <div class="p-6">
                                            <div class="aspect-w-16 aspect-h-9">
                                                <iframe class=""
                                                        src="https://www.youtube-nocookie.com/embed/{{ youtube_id_from_url($youtubeId) }}"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if($spotifyId && !$errors->has('spotifyId'))
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button"
                                            class="w-full px-8 py-6 text-left shadow rounded-md  bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">Spotify<i class="fab fa-spotify px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all h-full duration-700">
                                        <div class="p-6">
                                            <iframe class="w-full"
                                                    src="https://open.spotify.com/embed/track/{{ $spotifyId}}"
                                                    width="auto" height="380" allowtransparency="true"
                                                    allow="encrypted-media">
                                            </iframe>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if($soundcloudId && !$errors->has('soundcloudId'))
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button"
                                            class="w-full px-8 py-6 text-left shadow rounded-md  bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">SoundCloud<i
                                                    class="fab fa-soundcloud px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all h-full duration-700">
                                        <div class="p-6">
                                            <iframe class="embed-responsive m-0"
                                                    width="100%" height="300" scrolling="no"
                                                    frameborder="no" allow="autoplay"
                                                    src="https://w.soundcloud.com/player/?url={{ $soundcloudId }}&color=%23b0acac&auto_play=false&hide_related=false&show_comments=false&show_user=true&show_reposts=false&show_teaser=true&visual=true">
                                            </iframe>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if($deezerId && !$errors->has('deezerId'))
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button"
                                            class="w-full px-8 py-6 text-left shadow rounded-md  bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">Deezer<i class="fab fa-deezer px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all h-full duration-700">
                                        <div class="p-6">
                                            <iframe class="embed-responsive m-0"
                                                    title="deezer-widget"
                                                    src="https://widget.deezer.com/widget/auto/track/{{ $deezerId }}"
                                                    width="100%"
                                                    height="300" frameborder="0" allowtransparency="true"
                                                    allow="encrypted-media">
                                            </iframe>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    </section>
                @else
                    <section class="w-full p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <x-button-icon icon="fas fa-plus" wire:click="refresh()">Dodaj kolejną piosenkę
                            </x-button-icon>
                            <x-button-icon wire:click="dashboard" icon="fas fa-plus" >Wróć do panelu
                            </x-button-icon>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
</div>
