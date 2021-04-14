<div class="relative">
    <label for="{{ $name }}" class="relative z-10 block p-2 bg-white rounded-md dark:bg-gray-800 focus:outline-none">{{ $readable }}</label>
    <select name="{{ $name }}" wire:model="{{ $model }}" class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800">
        <option class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white" value=''>{{ $name }}</option>
        @foreach($options as $i)
            <option class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white" value={{ $i }}>{{ $i }}</option>
        @endforeach
    </select>
</div>
