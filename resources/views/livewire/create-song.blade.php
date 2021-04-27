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
                    @isset($tags)
                        @foreach($tags as $tag)
                            <x-jet-secondary-button class="my-1 font-semibold">
                                #{{ $tag['name'] }}</x-jet-secondary-button>
                        @endforeach
                    @endisset
                </p>
                <div class="flex justify-end mt-4">
                    <span
                        class="text-xl font-medium text-indigo-500 dark:text-indigo-300">{!! $artist ? $artist->name : "&nbsp;" !!}
                    </span>
                </div>
            </div>
            <div class="flex justify-center md:justify-start space-x-2 my-1 px-1 md:px-6 md:py-2 flex-wrap">
                <section class="w-full p-6 bg-white rounded-md shadow-md dark:bg-gray-800">
                    <form wire:submit.prevent="addSong" autocomplete="off">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div class="col-span-full">
                                <label class="text-gray-700 dark:text-gray-200 text-xl text-semibold select-none">Łatwe
                                    dodawanie
                                    piosenek za
                                    pomocą Spotify <i class="fab fa-spotify p-1"></i></label>
                                <br/>
                                <livewire:spotify.song-search name="spotifyId"/>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="title">Tytuł <span
                                        class="text-red-700"  {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>

                                <input wire:model="title" id="title" type="text" placeholder="Wpisz tytuł..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                                       dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                       focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                       disabled:bg-gray-100 disabled:dark:bg-gray-100
                       @error('title') ring-2 ring-red-500 @enderror"
                                       @if($spotifyId != null) disabled @endif>
                                <p class="text-red-500 text-sm p-1 font-semibold">@error('title'){{ $message }}@enderror
                                    &nbsp;</p>
                            </div>
                            <div>
                                <label
                                    class="text-gray-700 dark:text-gray-200"
                                    for="artist">Artysta
                                </label>
                                <livewire:artist-select name="artist" disabled="{{$spotifyId != null}}"/>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="key">Klucz <span
                                        class="text-red-700"  {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>
                                <livewire:select name="key" :options="$keys" placeholder="Wybierz klucz..."/>
                            </div>
                            <div class="col-span-full">
                                <label for="text"
                                       class="text-gray-700 dark:text-gray-200">
                                    Tekst piosenki <span class="text-red-700" {{ Popper::pop(tip("warning", "To pole jest wymagane", "")) }}>*</span></label>
                                <textarea
                                    wire:model="text"
                                    wire:ignore
                                    id="text"
                                    x-data="{ resize: () => { $el.style.height = '15px'; $el.style.height = $el.scrollHeight + 'px' } }"
                                    x-init="resize()"
                                    @input="resize()"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                                rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring
                                font-mono resize-none overflow-hidden"
                                ></textarea>
                            </div>
                            <div>
                                <label for="tags"
                                       class="text-gray-700 dark:text-gray-200">
                                    Tagi</label>
                                <livewire:tags-select/>
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="deezerId">Link do Deezer<i
                                        class="fab fa-deezer p-1"></i></label>
                                <input wire:model="deezerId" id="deezerId" type="text" placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                @error('deezerId')
                                <span class="invalid"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="youtubeId">Link do YouTube<i
                                        class="fab fa-youtube p-1"></i></label>
                                <input wire:model="youtubeId" id="youtubeId" type="text" placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="soundcloudId">Link do SoundCloud<i
                                        class="fab fa-soundcloud p-1"></i></label>
                                <input wire:model="soundcloudId" id="soundcloudId" type="text"
                                       placeholder="Wprowadź link..."
                                       class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            </div>
                            <div>
                                <x-jet-label for="isVerified">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="isVerified" id="isVerified"/>
                                        <div class="ml-2">
                                            Chcę zweryfikować tę piosenkę.
                                        </div>
                                    </div>
                                </x-jet-label>
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
                            @if($youtubeId)
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">YouTube<i class="fab fa-youtube px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                         style="max-height: 500px">
                                        <div class="p-6">
                                            <div class="aspect-w-16 aspect-h-9">
                                                <iframe class=""
                                                        src="https://www.youtube-nocookie.com/embed/{{ $youtubeId }}"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @if($spotifyId)
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md  bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">Spotify<i class="fab fa-spotify px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                         style="max-height: 400px">
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
                            @if($soundcloudId)
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md  bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">SoundCloud<i
                                                    class="fab fa-soundcloud px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                         style=""
                                         x-ref="container1"
                                         x-bind:style="'max-height: ' + $refs.container1.scrollHeight + 'px'">
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
                            @if($deezerId)
                                <li class="relative dark:bg-gray-800 rounded-md">
                                    <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md  bg-gray-50 dark:bg-gray-900">
                                        <div class="flex items-center justify-between">
                                            <span class="text-2xl">Deezer<i class="fab fa-deezer px-2"></i></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                         style=""
                                         x-ref="container1"
                                         x-bind:style="'max-height: ' + $refs.container1.scrollHeight + 'px'">
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
            </div>
        </div>
    </div>
</div>
