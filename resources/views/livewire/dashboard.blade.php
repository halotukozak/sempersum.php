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
                        <span
                            wire:click="show('add')"
                            class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                class="fa fa-plus p-2"></i>Dodaj piosenkę</span>
                        @if(current_user()->isModerator || !empty(current_user()->artist))
                            <span
                                wire:click="show('verify')"
                                class="cursor-pointer px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700"><i
                                    class="fa fa-check p-2"></i>Weryfikuj piosenki</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @switch($page)
            @case('verify')
            <livewire:verification-section/>
            @break

            @case('add')
            <livewire:song.create/>
            @break

            @default

        @endswitch
    </div>
</div>
