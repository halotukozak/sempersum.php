<div class="space-y-3"
wire:poll>
    <section
        class="flex mx-auto overflow-hidden rounded-lg shadow-lg bg-gray-700 dark:bg-gray-800 md:flex-row md:h-48">
        <div class="flex items-center md:justify-center">
            <div class="px-6 py-6 md:px-8 md:py-0">
                <h2 class="text-lg font-bold text-white md:text-gray-100">Twórz śpiewniki <span
                        class="text-blue-400">wspólnie</span>. </h2>
                <p class="mt-2 text-sm text-gray-400">Wpisz adres e-mail przyjaciela, aby razem pracować nad śpiewnikiem.</p>
                <br/>
                <span class="text-white">lub
                <a href="{{ route('createSongbook') }}"
                   class="text-blue-400 p-4 tracking-wider hover:text-blue-500 font-bold">stwórz nowy śpiewnik</a>
                </span>
            </div>
        </div>
    </section>
    @foreach($songbooks as $songbook)
        <livewire:songbook.index :songbook="$songbook" :key="$loop->index"/>
    @endforeach
</div>
