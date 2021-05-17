<button {{ $attributes->merge(['type' => 'button', 'class' => 'm-1 flex items-center px-2 py-2 font-medium tracking-wide text-white transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-green-800 hover:bg-green-500 dark:hover:bg-green-700 focus:outline-none focus:bg-green-500 dark:focus:bg-green-700']) }}>
    <i class="w-5 h-5 mx-1 {{ $icon }}"></i>
    <span class="mx-1">{{ $slot }}</span>
</button>
