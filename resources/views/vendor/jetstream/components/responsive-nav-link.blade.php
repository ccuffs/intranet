@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-600 text-base font-medium text-indigo-300 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-900 focus:border-indigo-300 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-400 hover:text-gray-200 hover:bg-gray-50 hover:border-gray-700 focus:outline-none focus:text-gray-200 focus:bg-gray-50 focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
