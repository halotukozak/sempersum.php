<div
    class="px-1 pt-3 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300"
    x-data="{
    isOpen: true,
    selectedIndex: -1,
    selectUp(component) {
    if (this.selectedIndex === 0) {
    return
    }
    this.selectedIndex--
    },
    selectDown(component) {
    if (component.data.optionsValues.length - 1 === this.selectedIndex) {
    return
    }
    this.selectedIndex++
    },
    selectIndex(index) {
    this.selectedIndex = index
    this.isOpen = true
    },
    confirmSelection(component) {
    const value = component.data.optionsValues.length === 1
    ? component.data.optionsValues[0]
    : component.data.optionsValues[this.selectedIndex]

    if (!value) {
    return
    }

    component.set('value', value)

    this.selectedIndex = -1
    this.isOpen = true
    },
    removeSelection(component) {
    component.set('value', null)

    this.selectedIndex = -1
    this.isOpen = true
    }
    }" x-on:click.away="isOpen = false">
    <div class="relative">
        @if(!empty($value))
            <button type="button"
                    class="relative
                        w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                                           dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                           focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    x-on:keydown.enter.prevent="removeSelection(@this)"
                    x-on:keydown.space.prevent="removeSelection(@this)"
                    id="{{ $name }}-selected"
                    wire:click.prevent="selectValue(null)">
                    <span class="flex items-center">
                        <img
                            src="{{ $selectedOption['album']['images'][1]['url'] }}"
                            alt="" class="flex-shrink-0 h-6 w-6 rounded-full"/>
                        <span class="ml-3 block truncate">
                            <span class="ml-3 block truncate">
                                {{ $selectedOption['name'] }}
                            </span>
                        </span>
                    </span>
                <input type="hidden" value="{{ $value }}" name="{{ $name }}">
            </button>
        @else
            <div id="options" class="relative">
                <input
                    id="{{ $name }}"
                    name="{{ $name }}"
                    type="text"
                    placeholder="Wyszukaj piosenkę w Spotify..."
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"

                    wire:keydown.enter.prevent="$refresh"
                    wire:model.debounce.300ms="term"

                    x-on:click="isOpen = true"
                    x-on:keydown="isOpen = true"

                    x-on:keydown.arrow-up="selectUp(@this)"
                    x-on:keydown.arrow-down="selectDown(@this)"
                    x-on:keydown.enter.prevent="confirmSelection(@this)"

                    autocomplete="off"
                />
                <div
                    class="absolute top-0 left-0 mt-12 w-full z-10"
                    x-show="isOpen"
                >
                    @if($options && !$emptyOptions)
                        @foreach($options as $option)
                            <div
                                class="block z-10 bg-white w-full rounded-t-none shadow-lg p dark:bg-gray-800 cursor-pointer">
                                <span
                                    class="flex items-center justify-between z-10 bg-white w-full rounded-t-none shadow-lg p-4 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 dark:text-gray-50 @if ($loop->last) rounded-b-md @endif"
                                    wire:click="selectOption('{{$option['id']}}')"
                                    x-bind:class="{ 'bg-gray-200': selectedIndex === {{ $loop->index }}}"
                                    x-on:mouseover="selectedIndex = {{ $loop->index }}">
                                    <img
                                        src="{{ $option['album']['images'][1]['url'] }}"
                                        alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span class="ml-3 block truncate">
                                      {{ $option['name'] }}
                                    </span>
                                    @if ($option['preview_url'] != 0)
                                        <div>
                                            <button class="px-2.5"
                                                    wire:mouseover="$emitSelf('play', '{{ $option['id'] }}')"
                                                    wire:mouseleave="$emitSelf('stop')"
                                            >
                                            <i class="fas fa-play"></i>
                                            </button>
                                            @if($playingSong == $option['id'])
                                                <audio
                                                    type="audio/mp3"
                                                    src="{{ $option['preview_url'] }}"
                                                    autoplay
                                                ></audio>
                                            @endif
                                        </div>
                                    @else
                                        <div></div>
                                    @endif
                                </span>
                            </div>
                            @if ($loop->index == 10)
                                @break
                            @endif
                        @endforeach
                    @elseif ($isSearching)
                        <div
                            class="block z-10 bg-white w-full rounded-t-none shadow-lg p-4 dark:bg-gray-800 rounded-b-md dark:text-gray-50">
                            Przykro mi, ale nie wiem o co Ci chodzi...
                        </div>
                    @endif
                    <div wire:loading
                         class="block z-10 bg-white w-full rounded-t-none shadow-lg p-4 dark:bg-gray-800 rounded-b-md dark:text-gray-50">
                        Szukam...
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
