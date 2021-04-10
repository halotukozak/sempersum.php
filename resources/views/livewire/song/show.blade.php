<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow bg-white dark:bg-gray-600 rounded-lg mx-3 md:m-auto">
            <div class="p-6 sm:px-10 bg-white dark:bg-gray-800 dark:border-gray-600 rounded-lg">
                <button wire:click="like"
                        class="pr-5"
                        type="submit">
                    <span class="text-2xl text-gray-700 inline-block p-2">
                        <i class="text-2xl text-red-800 hover:text-red-7600 {{ $liked ? 'fas' : "far" }} fa-heart"></i>
                        {!! $likes == null ? '&nbsp;&nbsp;' : $likes !!}
                    </span>
                </button>
                <span class="text-2xl md:text-4xl font-black text-gray-700 dark:text-gray-200">{{ $song->title }}</span>
                <div class="flex justify-center mb-3">
                    @if ($song->artist->path() == "")
                        <a href="{{ $song->artist->path() }}">
                            <img class="object-cover w-20 h-20 rounded-full"
                                 alt="Artist's avatar."
                                 src="{{ $song->artist->avatar() }}">
                        </a>
                    @else
                        <div class="object-cover w-20 h-20 rounded-full bg-blue-600"></div>
                    @endif
                </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="row d-flex justify-content-between">
                            <div class="col">
                                <span class="h2">{{ $song->title }}</span>

                                <div class="text-muted">
                                    {{ $song->comments }}
                                </div>
                                <hr class="d-none d-md-block">
                                <div class="p-1 flex-column d-none d-md-block">
                                    @foreach($song->tags as $tag)
                                        <a href="{{ route('search', ['tag' => $tag->name]) }}"
                                           class="btn btn-outline-info m-1">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex-column text-center justify-content-center">
                                <iframe class="d-block mx-auto"
                                        src="https://open.spotify.com/follow/1/?uri={{ $song->artist->spotify('uri') }}&size=basic&theme=light&show-count=0"
                                        width="100" height="35" scrolling="no" style="border:none;"
                                        allowtransparency="true">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @auth
                            <a class="btn btn-lg btn-primary m-2" href="{{ $song->path() }}/edit">
                                <span class="p-1">Edytuj</span>
                            </a>
                        @endauth

                        @can('verify', $song)
                            @if(!($song->isVerified))
                                <form method="POST" action="{{ $song->path() }}/verify" class="d-inline">
                                    @csrf
                                    <button class="btn btn-lg btn-primary" type="submit">
                                        <span class="p-1">Zatwierdź</span>
                                    </button>
                                </form>
                            @endif
                        @endcan

                        <button class="btn btn-lg btn-primary m-2" id="hide" role="button">
                            <span class="p-1 mx-auto">Ukryj akordy</span>
                        </button>

                        <pre data-key="{{ $song->key }}" class="text-dark m-auto px-md-5">
                        {{ $song->text }}
                </pre>

                        <hr class="d-md-none">
                        <div class="p-1 d-md-none justify-content-center">
                            @foreach($song->tags as $tag)
                                <a href="{{ route('search', ['tag' => $tag->name]) }}"
                                   class="btn btn-outline-info m-1">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <div>
                            @if($song->youtubeId)
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header p-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button
                                                    class="btn btn-light collapsed justify-content-center p-3 col d-flex align-middle"
                                                    type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="col col-md-6"><i class="icon-youtube h2 pr-2"></i><span
                                                            class="h2 m-2">YouTube</span>
                                                    </div>
                                                </button>
                                            </h5>

                                        </div>
                                        <div id="collapseOne"
                                             class="collapse {{ current_user()->preferred_playback == "youtube" ? "show" : "" }}"
                                             aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <div class="card-body p-0">
                                                <div class="embed-responsive m-0 embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item"
                                                            src="https://www.youtube-nocookie.com/embed/{{ $song->youtubeId }}?controls=0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($song->spotifyId)
                                        <div class="card">
                                            <div class="card-header p-0" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button
                                                        class="btn btn-light collapsed justify-content-center p-3 col d-flex "
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                        <div class=" col col-md-6"><i class="icon-spotify h1"></i><span
                                                                class="h2 m-2">Spotify</span>
                                                        </div>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo"
                                                 class="collapse {{ current_user()->preferred_playback == "spotify" ? "show" : "" }}"
                                                 aria-labelledby="headingTwo"
                                                 data-parent="#accordionExample">
                                                <div class="card-body p-0">
                                                    <iframe class="embed-responsive m-0"
                                                            src="https://open.spotify.com/embed/track/{{ $song->spotifyId}}"
                                                            width="auto" height="380" allowtransparency="true"
                                                            allow="encrypted-media">
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($song->soundcloudLink)
                                        <div class="card">
                                            <div class="card-header p-0" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button
                                                        class="btn btn-light collapsed justify-content-center p-3 col d-flex "
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree">
                                                        <div class=" col col-md-6"><i class="icon-soundcloud h2"></i><span
                                                                class="h2 m-2">SoundCloud</span>
                                                        </div>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree"
                                                 class="collapse {{ (current_user()->preferred_playback == "soundcloud") || (current_user()->preferred_playback == null) ? "show" : "" }}"
                                                 aria-labelledby="headingThree"
                                                 data-parent="#accordionExample">
                                                <div class="card-body p-0">
                                                    <iframe class="embed-responsive m-0"
                                                            width="100%" height="300" scrolling="no"
                                                            frameborder="no" allow="autoplay"
                                                            src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{ $song->soundcloudLink }}&color=%23b0acac&auto_play=false&hide_related=false&show_comments=false&show_user=true&show_reposts=false&show_teaser=true&visual=true">
                                                    </iframe>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($song->deezerId)
                                        <div class="card">
                                            <div class="card-header p-0" id="headingFour">
                                                <h5 class="mb-0 ">
                                                    <button
                                                        class="btn btn-light collapsed justify-content-center p-3 col d-flex "
                                                        type="button" data-toggle="collapse"
                                                        data-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">
                                                        <div class=" col col-md-6"><i class="icon-deezer h2 m-2"></i><span
                                                                class="h2 m-2"> Deezer</span>
                                                        </div>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseFour"
                                                 class="collapse {{ current_user()->preferred_playback == "deezer" ? "show" : "" }}"
                                                 aria-labelledby="headingFour"
                                                 data-parent="#accordionExample">
                                                <div class="card-body p-0">
                                                    <iframe class="embed-responsive m-0"
                                                            title="deezer-widget"
                                                            src="https://widget.deezer.com/widget/auto/track/{{ $song->deezerId }}"
                                                            width="100%"
                                                            height="300" frameborder="0" allowtransparency="true"
                                                            allow="encrypted-media">
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/jquery-transposer.js') }}"></script>
    <script src="{{ asset('js/chord-hider.js') }}"></script>
    <script type="text/javascript" defer>
        $(function() {
            $("pre").transpose();
        });
    </script>
</div>
