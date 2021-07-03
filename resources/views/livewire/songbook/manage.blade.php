<section class="w-full max-w-2xl px-6 py-4 my-5 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <div class="h-24">
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">{!! $name !!}</h2>
    </div>
    <div class="w-full">
        <form wire:submit.prevent="submit" autocomplete="off">
            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="name">Nazwa</label>

            <input
                wire:model="name"
                id="name"
                class="block w-full px-4 py-2 my-3 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                type="text">
            @error('name')
            <x-jet-input-error for="name">{{ $message }}</x-jet-input-error>
            @enderror

{{--            <input id="photoUpload" type="file" wire:model="photo" class="hidden">--}}
{{--            <label for="photoUpload">Wybierz obrazek</label>--}}
{{--            @if ($photo)--}}
{{--                <img src="{{ $photo->temporaryUrl() }}">--}}
{{--            @endif--}}
{{--            @error('photo') <span class="error">{{ $message }}</span> @enderror--}}

            <label
                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">{{ __('Password') }}</label>

            <input
                wire:model="password"
                class="block w-full px-4 py-2 my-3  text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                type="password" name="password" aria-label="password">
            <label
                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">{{ __('Confirm Password') }}</label>
            <input
                wire:model="password_confirmation"
                class="block w-full px-4 py-2 my-3  text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                type="password" name="password_confirmation" aria-label="password_confirmation">
            @error('password')
            <x-jet-input-error for="password">{{ $message }}</x-jet-input-error>
            @enderror

            <div class="w-full mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Komentarz</label>

                <textarea
                    class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
            </div>

            <div class="flex justify-center mt-6">
                <button
                    class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</section>
