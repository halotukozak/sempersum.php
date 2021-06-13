<div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-between">
        <span
            class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $songbook->updated_at->diffForHumans() }}</span>
        <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500">przycisk</a>

        <x-button-icon x-data="new Clipboard($el)"
                       icon="fa fa-share" id="share" data-clipboard-action="copy"
                       x-text="textOnShareButton"
                       data-clipboard-text="{{ $songbook->password }}"
                       x-on:click="textOnShareButton = '{{__('Copied.')}}'">
            Udostępnij hasło
        </x-button-icon>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>
        <script>
            new Clipboard();
        </script>
    @endpush
    <div class="mt-2">
        <a href="#"
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
        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>
        @if ($songbook->users->count() > 1)
            <p class="text-gray-600 dark:text-gray-300"> Współtwórcy:</p>
            @foreach($songbook->users->except(current_user()->id) as $user)
                <div class="flex items-center">
                    <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{ $user->name }}</a>
                </div>
            @endforeach
        @endif
    </div>
</div>
