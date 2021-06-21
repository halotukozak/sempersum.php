<div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-between"
         x-data="{open : false}">
        <span
            class="text-sm font-light text-gray-600 dark:text-gray-400">Utworzony {{ $songbook->updated_at->diffForHumans() }}</span>
        <span
            class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md sm:mx-2 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ $songbook->password }}</span>

        <x-button-icon
            icon="fa fa-share"
            onclick="copyTextToClipboard({{$songbook->password }})"
            @click="open = true"
            x-text="open ? 'Skopiowano do schowka.' : $el.text() ">
            Udostępnij hasło
        </x-button-icon>
    </div>
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
