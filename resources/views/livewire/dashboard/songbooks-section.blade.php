<div class="space-y-3" wire:poll.keep-alive>
    <section
            class="flex flex-col max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 md:flex-row md:h-48">
        <div class="md:flex md:items-center md:justify-center md:w-1/2 md:bg-gray-700 md:dark:bg-gray-800">
            <div class="px-6 py-6 md:px-8 md:py-0">
                <h2 class="text-lg font-bold text-white md:text-gray-100">Twórz śpiewniki <span
                            class="text-blue-400">wspólnie</span>. </h2>
                <p class="mt-2 text-sm text-gray-400">Wpisz hasło, aby móc
                    przygotowywać śpiewnik z przyjaciółmi.</p>
            <br/>
                <span class="text-white">lub
                <a href="#" class="text-blue-400 p-4 tracking-wider hover:text-blue-500 font-bold">stwórz nowy śpiewnik</a>
                </span>
            </div>

        </div>

        <div class="flex items-center justify-center pb-6 md:py-0 md:w-1/2">
            <form wire:submit.prevent="add" autocomplete="off" class="text-center">
                <div class="flex flex-col overflow-hidden lg:flex-row rounded-lg border-2 border-gray-700">
                    <input
                            class="border-transparent px-6 py-3 text-gray-600 placeholder-gray-500 bg-white outline-none dark:bg-gray-800 dark:placeholder-gray-400 focus:placeholder-transparent dark:focus:placeholder-transparent focus:outline-none"
                            wire:model="password"
                            type="text" placeholder="Wpisz hasło do śpiewnika..."
                            aria-label="Wpisz hasło do śpiewnika..."/>
                    <button
                            class="px-4 py-3 text-sm font-medium tracking-widest text-gray-100 uppercase transition-colors duration-200 transform bg-gray-700 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">
                        Dołącz
                    </button>
                </div>
                <x-jet-input-error for="password"></x-jet-input-error>
            </form>
        </div>
    </section>
    @foreach($songbooks as $songbook)
        <livewire:songbooks.index :songbook="$songbook" :wire:key="$loop->index"/>
    @endforeach
    @push('scripts')
        <script>
            function copyTextToClipboard(text) {
                let textArea = document.createElement("textarea");
                textArea.style.position = 'fixed';
                textArea.style.top = '0';
                textArea.style.left = '0';
                textArea.style.width = '2em';
                textArea.style.height = '2em';
                textArea.style.padding = '0';
                textArea.style.border = 'none';
                textArea.style.outline = 'none';
                textArea.style.boxShadow = 'none';
                textArea.style.background = 'transparent';
                textArea.value = text;

                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
            }
        </script>
    @endpush
</div>