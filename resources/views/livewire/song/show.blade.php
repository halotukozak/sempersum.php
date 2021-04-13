<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow bg-white dark:bg-gray-600 rounded-lg mx-3 md:m-auto">
            <div class="px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16">
                <div class="flex justify-center -mt-16 md:justify-end mb-3">
                    <a href="{{ $song->artist->path() }}">
                        <img class="object-cover w-20 h-20 rounded-full"
                             alt="Artist's avatar."
                             src="{{ $song->artist->avatar() }}">
                    </a>
                </div>
                <button wire:click="like"
                        class="inline-flex -mt-10 align-top"
                        type="submit">
                <span class="text-2xl text-gray-700 inline-block p-2">
                    <i class="text-2xl text-red-800 hover:text-red-7600 {{ $liked ? 'fas' : "far" }} fa-heart"></i>
            {!! $likes == null ? '&nbsp;&nbsp;' : $likes !!}
            </span>
                </button>
                <a href="{{ $song->path() }}">

                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">{{ $song->title }}</h2>

                    <p class="mt-6 text-gray-600 dark:text-gray-200">
                        @foreach($song->tags as $tag)
                            {{--            <a href="{{ route('search', ['tag' => $tag->name]) }}"/>--}}
                            <x-jet-secondary-button class="my-1 font-semibold">{{ $tag->name }}</x-jet-secondary-button>
                        @endforeach
                    </p>

                    <div class="flex justify-end mt-4">
                        <object>
                            <a href="{{ $song->artist->path() }}"
                               class="text-xl font-medium text-indigo-500 dark:text-indigo-300">{{ $song->artist->name }}
                            </a>
                        </object>
                    </div>
                </a>
            </div>


            <div class="inline-flex space-x-2 m-3">
                @auth
                    <x-jet-button>Edytuj</x-jet-button>
                @endauth

                @can('verify', $song)
                    @if(!($song->isVerified))
                        <x-jet-button>Zatwierdź</x-jet-button>
                    @endif
                @endcan
                <x-jet-dropdown>
                    <x-slot name="trigger">
                        <x-jet-button>Transponuj</x-jet-button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach ($keys as $key)
                            <x-jet-dropdown-link class="key">{{ $key }}</x-jet-dropdown-link>
                        @endforeach</x-slot>
                </x-jet-dropdown>

                <x-jet-button id="hide" role="button">Ukryj akordy</x-jet-button>
            </div>

            <pre data-key="{{ $song->key }}" class="m-3">{{ $song->text }}</pre>

            <div class="dark:text-white p-2" x-data="{selected:{!! $preferred_playback !!}}">
                <ul class="shadow-box">
                    @if($song->youtubeId)
                        <li class="relative dark:bg-gray-800 rounded-xl">
                            <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md"
                                    @click="selected !== 1 ? selected = 1 : selected = null"
                                    x-bind:class="selected == 1 ? 'bg-gray-50 dark:bg-gray-900' : ''">
                                <div class="flex items-center justify-between">
                                    <span>YouTube <i class="fab fa-youtube"></i></span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                 style=""
                                 x-ref="container1"
                                 x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <iframe class=""
                                            src="https://www.youtube-nocookie.com/embed/{{ $song->youtubeId }}?controls=0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if($song->spotifyId)
                        <li class="relative rounded-xl dark:bg-gray-800">
                            <button type="button" class="w-full px-8 py-6 text-left"
                                    @click="selected !== 2 ? selected = 2 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span>Spotify <i class="fab fa-spotify"></i></span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                 style=""
                                 x-ref="container1"
                                 x-bind:style="selected == 2 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <iframe class="embed-responsive m-0"
                                            src="https://open.spotify.com/embed/track/{{ $song->spotifyId}}"
                                            width="auto" height="380" allowtransparency="true"
                                            allow="encrypted-media">
                                    </iframe>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if($song->soundcloudId)
                        <li class="relative rounded-xl dark:bg-gray-800">
                            <button type="button" class="w-full px-8 py-6 text-left"
                                    @click="selected !== 3 ? selected = 3 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span>SoundCloud <i class="fab fa-soundcloud"></i></span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                 style=""
                                 x-ref="container1"
                                 x-bind:style="selected == 3 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <iframe class="embed-responsive m-0"
                                            width="100%" height="300" scrolling="no"
                                            frameborder="no" allow="autoplay"
                                            src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{ $song->soundcloudId }}&color=%23b0acac&auto_play=false&hide_related=false&show_comments=false&show_user=true&show_reposts=false&show_teaser=true&visual=true">
                                    </iframe>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if($song->deezerId)
                        <li class="relative rounded-xl dark:bg-gray-800">
                            <button type="button" class="w-full px-8 py-6 text-left"
                                    @click="selected !== 4 ? selected = 4 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span>Deezer <i class="fab fa-deezer"></i></span>
                                </div>
                            </button>
                            <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                 style=""
                                 x-ref="container1"
                                 x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="p-6">
                                    <iframe class="embed-responsive m-0"
                                            title="deezer-widget"
                                            src="https://widget.deezer.com/widget/auto/track/{{ $song->deezerId }}"
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
        </div>
    </div>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/jquery-transposer.js') }}"></script>
    <script src="{{ asset('js/chord-hider.js') }}"></script>
    <script type="text/javascript" defer>
        $(function () {
            $("pre").transpose();
        });
    </script>
</div>
