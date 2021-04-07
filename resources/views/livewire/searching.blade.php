<div class="shadow p-6 bg-white w-full">
    <div class="pt-2 relative mx-auto text-gray-600 ">
        <div class="flex mb-10 justify-center align-middle">
            <input wire:model="term"
                   wire:keydown.escape="resetBar"
                   wire:keydown.tab="resetBar"
                   wire:keydown.arrow-up="decrementHighlight"
                   wire:keydown.arrow-down="incrementHighlight"
                   wire:keydown.enter="selectSong"
                   class="border-2 border-gray-300 bg-white h-12 w-5/6 px-5 pr-16 rounded-lg scale-125 focus:outline-none flex-auto"
                   type="text" name="search" placeholder="Wyszukaj..." id="search"
                   autocomplete="off"
            >
            <label for="search" class="inline-block p-3.5">
                <i class="fas fa-search"></i>
            </label>
        </div>
        @if($songs->isNotEmpty())
            @foreach($songs as $song)
                <livewire:song.search :song="$song"/>
            @endforeach
            {{ $songs->links() }}
        @else
            <div
                class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 rounded">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 text-center">
                    <p class="p-6">Przykro mi, ale nie wiem o co Ci chodzi...</p>
                </div>
            </div>
        @endif
    </div>
</div>
