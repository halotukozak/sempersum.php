<div class="dark:text-white p-2" x-data="{selected:{!! $preferred_streaming_service !!}}">
    <ul class="shadow-box space-y-2">
        @if($song->youtubeId)
            <li class="relative dark:bg-gray-800 rounded-md">
                <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md"
                        @click="selected !== 1 ? selected = 1 : selected = null"
                        x-bind:class="selected == 2 ? 'bg-gray-50 dark:bg-gray-900' : ''">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl">YouTube<i class="fab fa-youtube px-2"></i></span>
                    </div>
                </button>
                <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                     style=""
                     x-ref="container1"
                     x-bind:style="selected == 1 ? 'max-height: 500px' : ''">
                    <div class="p-6">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe class=""
                                    src="https://www.youtube-nocookie.com/embed/{{ youtube_id_from_url($song->youtubeId) }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </li>
        @endif
        @if($song->spotifyId)
            <li class="relative dark:bg-gray-800 rounded-md">
                <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md"
                        @click="selected !== 2 ? selected = 2 : selected = null"
                        x-bind:class="selected == 2 ? 'bg-gray-50 dark:bg-gray-900' : ''">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl">Spotify<i class="fab fa-spotify px-2"></i></span>
                    </div>
                </button>
                <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                     style=""
                     x-ref="container1"
                     x-bind:style="selected == 2 ? 'max-height: 400px' : ''">
                    <div class="p-6">
                        <iframe class="w-full"
                                src="https://open.spotify.com/embed/track/{{ $song->spotifyId}}"
                                width="auto" height="380" allowtransparency="true"
                                allow="encrypted-media">
                        </iframe>
                    </div>
                </div>
            </li>
        @endif
        @if($song->soundcloudId)
            <li class="relative dark:bg-gray-800 rounded-md">
                <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md"
                        @click="selected !== 3 ? selected = 3 : selected = null"
                        x-bind:class="selected == 3 ? 'bg-gray-50 dark:bg-gray-900' : ''">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl">SoundCloud<i class="fab fa-soundcloud px-2"></i></span>
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
                                src="https://w.soundcloud.com/player/?url={{ $song->soundcloudId }}&color=%23b0acac&auto_play=false&hide_related=false&show_comments=false&show_user=true&show_reposts=false&show_teaser=true&visual=true">
                        </iframe>
                    </div>
                </div>
            </li>
        @endif
        @if($song->deezerId)
            <li class="relative dark:bg-gray-800 rounded-md">
                <button type="button" class="w-full px-8 py-6 text-left shadow rounded-md"
                        @click="selected !== 4 ? selected = 4 : selected = null"
                        x-bind:class="selected == 4 ? 'bg-gray-50 dark:bg-gray-900' : ''">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl">Deezer<i class="fab fa-deezer px-2"></i></span>
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
