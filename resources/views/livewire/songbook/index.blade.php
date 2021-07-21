<div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800"
     wire:poll.keep-alive>
    <div class="flex items-center justify-between">
        <span
            class="text-sm font-light text-gray-600 dark:text-gray-400">Utworzony {{ $songbook->updated_at->diffForHumans() }}</span>
    </div>
    <div class="mt-2">
        <p
            class="text-2xl font-bold text-gray-700 dark:text-white">{{ $songbook->name }}</p>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            @foreach($songbook->songs as $song)
                <i class="fa fa-circle"></i> {{ $song->title }}
                @if($loop->iteration > 5)
                    (...)
                    @break
                @endif
            @endforeach
        </p>
    </div>

    <div class="mt-2">
        @if ($songbook->users->count() > 1)
            <div class="text-gray-600 dark:text-gray-300"> Współtwórcy:
                @foreach($songbook->users->except(current_user()->id) as $user)
                    <a wire:click="removeUser({{$user->id}})"
                       class="font-bold text-gray-700 cursor- dark:text-gray-200">{{ $user->name }}@if(!$loop->last) |@endif</a>
                @endforeach
            </div>
        @endif
    </div>
    <div class="flex items-center justify-between mt-4">
        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Drukuj</a>
        <div>
            <div class="flex flex-col overflow-hidden lg:flex-row rounded-lg border-2 border-gray-700">
                <input
                    class="border-transparent px-6 py-3 text-gray-600 placeholder-gray-500 bg-white outline-none dark:bg-gray-800 dark:placeholder-gray-400 focus:placeholder-transparent dark:focus:placeholder-transparent focus:outline-none"
                    wire:model="email"
                    type="text" placeholder="Wpisz email..."
                    aria-label="Wpisz email..."/>
                <button
                    wire:click.prevent="addUser"
                    class="px-4 py-3 text-sm font-medium tracking-widest text-gray-100 uppercase transition-colors duration-200 transform bg-gray-700 hover:bg-gray-600 focus:bg-gray-600 focus:outline-none">
                    Dodaj
                </button>
            </div>
            <x-jet-input-error for="email"></x-jet-input-error>
        </div>
    </div>
</div>
