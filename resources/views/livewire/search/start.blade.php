<div class="p-3 md:p-6 bg-white w-full dark:bg-gray-600 rounded-lg">
    <div class="pt-2 relative mx-auto text-gray-600 ">
        <div class="flex justify-center align-middle">
            <input wire:model.debounce.500ms="term"
                   wire:keydown.enter="$refresh"
                   onclick="this.select()"
                   class="select-all border-2 border-gray-300 bg-white h-12 w-5/6 px-5 pr-16 rounded-lg scale-125 focus:outline-none flex-auto"
                   type="text" name="search" placeholder="Wyszukaj..." id="search"
                   autocomplete="off"
            >
            <label for="search" class="inline-block p-3.5">
                <i class="fas fa-search dark:text-white"></i>
            </label>
        </div>
        <div wire:loading.remove wire:target="term">
            @if(!empty($term) || !empty($tagTerm))
                @forelse($songs as $song)
                    <livewire:song.search :song="$song" :key="$song->id"/>
                @empty
                    <x-bootstrap.search.empty/>
                @endforelse
                <div x-data="{observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }"
                     x-init="observe">
                </div>
            @endif
        </div>
        <x-bootstrap.search.loading1/>
        <x-bootstrap.search.loading2/>
        <x-bootstrap.search.loading3/>
    </div>
</div>
