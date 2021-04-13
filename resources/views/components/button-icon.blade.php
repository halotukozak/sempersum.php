<button {{ $attributes->merge(['type' => 'submit', 'class' => 'm-1 flex items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700']) }}>
    <i class="w-5 h-5 mx-1 {{ $icon }}"></i>
    <span class="mx-1">{{ $slot }}</span>
</button>
