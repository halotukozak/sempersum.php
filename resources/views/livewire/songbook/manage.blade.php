<section class="w-full max-w-2xl px-6 py-4 my-5 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">{!! $name ? $name : '<br/><br/>' !!}</h2>
    <div class="w-full mx-2">
        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="name">Nazwa</label>

        <input
            wire:model="name"
            id="name"
            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
            type="text">
        <p class="text-red-500 text-sm p-1 font-semibold">@error('name'){{ $message }}@enderror</p>

    </div>

    <div class="mt-6 ">
        <div class="items-center -mx-2 md:flex">


            <div class="w-full mx-2 mt-4 md:mt-0">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">E-mail</label>

                <input
                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    type="email">
            </div>
        </div>

        <div class="w-full mt-4">
            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Message</label>

            <textarea
                class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
        </div>

        <div class="flex justify-center mt-6">
            <button
                class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                Send Message
            </button>
        </div>
    </div>
</section>
