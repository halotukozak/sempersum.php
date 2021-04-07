<div
    class="px-1 pt-3 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
    <input wire:model="term"
           wire:keydown.escape="resetBar"
           wire:keydown.tab="resetBar"
           wire:keydown.arrow-up="decrementHighlight"
           wire:keydown.arrow-down="incrementHighlight"
           wire:keydown.enter="selectSong"
           class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
           type="text" name="search" placeholder="Wyszukaj..." id="searchBar"
           autocomplete="off"
    >
    <label for="searchBar">
        <i class="fas fa-search p-1"></i>
    </label>

    @if(!empty($term))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetBar"></div>
        @if(!empty($songs))
            @foreach($songs as $i => $song)
                <div
                    class="relative block z-10 bg-white w-full rounded-t-none shadow-lg p-4 {{ $highlightIndex === $i ? "bg-gray-200" : "" }} hover:bg-gray-200">
                    <a href="{{ route('song', $song['slug']) }}"
                       class="no-underline">
                        <span class="">{{ $song['title'] }}</span>
                    </a>
                </div>

            @endforeach
        @else

            <div class="block z-10 bg-white w-full rounded-t-none shadow-lg p-4">
                Przykro mi, ale nie wiem o co Ci chodzi...
            </div>

        @endif
    @endif
    <div wire:loading class="block z-10 bg-white w-full rounded-t-none shadow-lg p-4">
        Szukam...
    </div>

</div>
