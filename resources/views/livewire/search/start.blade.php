<div class="p-6 bg-white w-full dark:bg-gray-600 rounded-lg">
    <div class="pt-2 relative mx-auto text-gray-600 ">
        <div class="flex mb-10 justify-center align-middle">
            <input wire:model.debounce.500ms="term"
                   wire:keydown.enter="$refresh"
                   class="border-2 border-gray-300 bg-white h-12 w-5/6 px-5 pr-16 rounded-lg scale-125 focus:outline-none flex-auto"
                   type="text" name="search" placeholder="Wyszukaj..." id="search"
                   autocomplete="off"
            >
            <label for="search" class="inline-block p-3.5">
                <i class="fas fa-search dark:text-white"></i>
            </label>
        </div>
        @if(!empty($term))
            @forelse($songs as $song)
                <livewire:song.search :song="$song" :key="$loop->index"/>
            @empty
                <div wire:loading.class="hidden">
                    <div
                        class="px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">
                            Przykro mi, ale nie wiem o co Ci chodzi...
                        </h2>
                    </div>
                </div>
            @endforelse
        @endif
        <div wire:loading.grid
             class="animate-pulse px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16 cursor-not-allowed">
            <div class="flex justify-center -mt-16 md:justify-end mb-3">
                <div class="bg-blue-400 rounded-full w-20 h-20">
                </div>
            </div>
            <div class="inline-flex -mt-10 align-top">
                <span class="text-2xl text-gray-700 inline-block p-2">
                    <i class="text-2xl text-red-800 hover:text-red-7600 fas fa-heart"></i>
            </span>
            </div>
            <div class="bg-blue-400 md:mt-0 w-2/3 h-5 rounded"></div>
            <p class="mt-6">
                <x-jet-secondary-button class="my-1  cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
            </p>
            <p class="">
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
            </p>
            <div class="flex justify-end mt-4">
                <object>
                    <div
                        class="text-xl">
                    </div>
                </object>
            </div>
        </div>
        <div wire:loading.grid
             class="animate-pulse px-6 py-4 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 shadow-md mt-16 cursor-not-allowed">
            <div class="flex justify-center -mt-16 md:justify-end mb-3">
                <div class="bg-blue-400 rounded-full w-20 h-20">
                </div>
            </div>
            <div class="inline-flex -mt-10 align-top">
                <span class="text-2xl text-gray-700 inline-block p-2">
                    <i class="text-2xl text-red-800 hover:text-red-7600 fas fa-heart"></i>
            </span>
            </div>
            <div class="bg-blue-400 md:mt-0 w-2/3 h-5 rounded"></div>
            <p class="mt-6">
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
            </p>
            <p class="">
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
                <x-jet-secondary-button class="my-1 cursor-not-allowed">&nbsp;&nbsp;&nbsp;&nbsp;
                </x-jet-secondary-button>
            </p>
            <div class="flex justify-end mt-4">
                <object>
                    <div
                        class="text-xl">
                    </div>
                </object>
            </div>
        </div>
    </div>
</div>
