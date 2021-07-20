<div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-between"
         x-data="{open : false}">
        <span
            class="text-sm font-light text-gray-600 dark:text-gray-400">Utworzony {{ $songbook->updated_at->diffForHumans() }}</span>
    </div>
    <div class="mt-2">
        <a href="{{ $songbook->path() }}"
           class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">{{ $songbook->name }}</a>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            @foreach($songbook->songs as $song)
                <i class="fa fa-circle"></i> {{ $song->title }}
                @if($loop->iteration > 5)
                    ...
                    @break
                @endif
            @endforeach
        </p>
    </div>

    <div class="flex items-center justify-between mt-4">
        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Drukuj</a>
        @if ($songbook->users->count() > 1)
            <p class="text-gray-600 dark:text-gray-300"> Współtwórcy:</p>
            @foreach($songbook->users->except(current_user()->id) as $user)
                @if ($user->can('manage', $songbook))
                    wtf
                    {{ $user }}
                @endif
                <div class="flex items-center">
                    <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{ $user->name }}</a>
                </div>
            @endforeach
        @endif
                <div class="flex items-center justify-center pb-6 md:py-0 md:w-1/2">
                    <form autocomplete="off" class="text-center">
                        <div class="flex flex-col overflow-hidden lg:flex-row rounded-lg border-2 border-gray-700">
                            <input
                                class="border-transparent px-6 py-3 text-gray-600 placeholder-gray-500 bg-white outline-none dark:bg-gray-800 dark:placeholder-gray-400 focus:placeholder-transparent dark:focus:placeholder-transparent focus:outline-none"
                                wire:model="password"
                                type="text" placeholder="Wpisz hasło do śpiewnika..."
                                aria-label="Wpisz hasło do śpiewnika..."/>
                            <button
                                class="px-4 py-3 text-sm font-medium tracking-widest text-gray-100 uppercase transition-colors duration-200 transform bg-gray-700 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none"
                                disabled>
                                Dołącz
                            </button>
                        </div>
                        <x-jet-input-error for="password"></x-jet-input-error>
                    </form>
                    <h2 class="text-lg font-bold text-white md:text-gray-100">Jeszcze niegotowe...</h2>
                </div>
    </div>
</div>
