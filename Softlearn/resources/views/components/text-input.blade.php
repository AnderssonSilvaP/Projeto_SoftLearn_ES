@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full bg-transparent border-t-0 border-x-0 border-b-2 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-0 transition-colors placeholder:text-gray-400 dark:placeholder:text-gray-500']) }}>
