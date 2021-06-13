<div>
    <nav class="bg-white shadow dark:bg-gray-800"
         x-data="{ open: true}">
        <div class="container px-6 py-3 mx-auto">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-gray-700">
                        <span
                            class="text-xl font-bold text-gray-800 dark:text-white md:text-2xl">Panel</span>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button"
                                @click="open = !open"
                                class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                                aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd"
                                      d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="flex-1 md:flex md:items-center md:justify-between"
                     x-show="open">
                    <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8">
                        <a href="{{ route('createSong') }}"
                           class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                class="fa fa-plus p-2"></i>Dodaj piosenkę</a>
                        @can('verify', \App\Http\Livewire\Dashboard::class)
                            <span
                                wire:click="$set('page','verify')"
                                class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                    class="fa fa-check p-2"></i>Weryfikuj piosenki</span>
                        @endcan
                        @can('manageArtist', \App\Http\Livewire\Dashboard::class)
                            <span
                                wire:click="$set('page','artist')"
                                class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                    class="fa fa-user p-2"></i>Zarządzaj profilem artysty</span>
                        @endcan
                        @if (current_user()->id === 1)
                            <span
                                wire:click="$set('page', 'reports')"
                                class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                    class="fa fa-toilet-paper p-2"></i>Wnioski</span>
                        @endif
                        <span
                            wire:click="$set('page', 'songbooks')"
                            class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                class="fa fa-list-ul p-2"></i>Śpiewniki</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div wire:loading
             class="z-20 absolute left-0 top-0 rounded-lg w-full h-full text-blue-500 text-center">
            <i class="fas fa-spinner animate-spin text-2xl absolute top-1/2 left-1/2"></i>
        </div>
        <div wire:loading.remove>
            @switch($page)
                @case('verify')
                <livewire:dashboard.verification-section/>
                @break

                @case('artist')
                @foreach(current_user()->artist as $artist)
                    <livewire:dashboard.artist-panel wire:key="$loop->index" :artist-id="$artist->id"/>
                @endforeach
                @break

                @case('reports')
                <livewire:dashboard.reports-section/>
                @break

                @case('songbooks')
                <livewire:dashboard.songbooks-section/>
                @break

                @default
                <livewire:dashboard.songbooks-section/>

{{--                <livewire:song.create/>--}}

            @endswitch
        </div>
    </div>
</div>
