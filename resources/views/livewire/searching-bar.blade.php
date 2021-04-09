<div
    class="px-1 pt-3 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 md:hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
    <div class="relative">
        <label for="searchBar" class="absolute inset-y-0 left-0 flex items-center pl-2">
            <i class="fas fa-search p-1"></i>
        </label>
        <input wire:model="term"
               wire:keydown.escape="resetBar"
               wire:keydown.tab="resetBar"
               wire:keydown.arrow-up="decrementHighlight"
               wire:keydown.arrow-down="incrementHighlight"
               wire:keydown.enter="selectSong"
               class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 py-2 pl-10 rounded-lg text-sm focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-500"
               type="text" name="search" placeholder="Wyszukaj..." id="searchBar"
               autocomplete="off"
        >
    </div>
    @if(!empty($term))
        @if(!empty($songs))
            @foreach($songs as $i => $song)
                <div
                    class="relative block z-10 bg-white w-full rounded-t-none shadow-lg p-4 {{ $highlightIndex === $i ? "bg-gray-200" : "" }} hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 @if ($loop->last) rounded-b-md @endif">
                    <a href="{{ route('song', $song['slug']) }}"
                       class="no-underline">
                        <span class="dark:text-gray-300">{{ $song['title'] }}</span>
                    </a>
                </div>
                @if($loop->iteration == 10)
                    <a href="{{ route('start') }}">
                        <div
                            class="text-center relative block z-10 bg-white w-full rounded-t-none shadow-lg p-4 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 rounded-b-md">
                            <span class="dark:text-gray-300 text-xl">Zobacz więcej...</span>
                        </div>
                    </a>
                    @break
                @endif
            @endforeach
        @else
            <div class="block z-10 bg-white w-full rounded-t-none shadow-lg p-4 dark:bg-gray-800">
                Przykro mi, ale nie wiem o co Ci chodzi...
            </div>
        @endif
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetBar"></div>
    @endif
    <div wire:loading class="block z-10 bg-white w-full rounded-t-none shadow-lg p-4 dark:bg-gray-800">
        Szukam...
    </div>
</div>
