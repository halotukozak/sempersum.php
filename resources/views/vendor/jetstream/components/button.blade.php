<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 font-medium tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700']) }}>
    {{ $slot }}
</button>
