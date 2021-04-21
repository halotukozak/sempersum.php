<div
    class="px-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300"
    x-data="{
    isOpen: false,
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
        <div id="options" class="relative">
            <button type="button"
                    class="relative
    w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md
                                           dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                                           focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"

                    wire:keydown.enter.prevent=""
                    x-on:click="isOpen = true"
                    x-on:keydown="isOpen = true"

                    x-on:keydown.arrow-up="selectUp(@this)"
                    x-on:keydown.arrow-down="selectDown(@this)"
                    x-on:keydown.enter.prevent="confirmSelection(@this)"
                    @if ($disabled) disabled @endif>
                    <span class="flex items-center">
                        <span class="ml-3 block truncate">
                          {{ $selectedOption }}
                        </span>
                    </span>
                <input hidden name="{{$name}}" value="{{ $value }}">
            </button>
            <div
                class="absolute top-0 left-0 mt-12 w-full z-10"
                x-show="isOpen"
            >
                @foreach($options as $option)
                    <div class="block z-10 bg-white w-full rounded-t-none shadow-lg p dark:bg-gray-800">
                                <span
                                    class="flex items-center z-10 bg-white w-full rounded-t-none shadow-lg p-4 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 @if ($loop->last) rounded-b-md @endif"
                                    wire:click="selectOption('{{$option}}')"
                                    x-on:click="isOpen = false"
                                    x-on:keydown="isOpen = false"
                                    x-bind:class="{ 'bg-gray-200': selectedIndex === {{ $loop->index }}}"
                                    x-on:mouseover="selectedIndex = {{ $loop->index }}">
                                    <span class="ml-3 block truncate">
                                      {{ $option }}
                                    </span>
                                </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
