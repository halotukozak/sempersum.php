<button {{ $attributes->merge(['type' => 'button', 'class' => 'm-1 flex items-center px-2 py-2 font-medium tracking-wide text-white transition-colors duration-200 transform bg-red-600 rounded-md dark:bg-red-800 hover:bg-red-500 dark:hover:bg-red-700 focus:outline-none focus:bg-red-500 dark:focus:bg-red-700']) }}>
    <i class="w-5 h-5 mx-1 {{ $icon }}"></i>
    <span class="mx-1">{{ $slot }}</span>
</button>
