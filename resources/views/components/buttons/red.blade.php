@props([])

<x-buttons.base {{ $attributes }} class="bg-red-600 enabled:hover:bg-red-800 enabled:hover:border-red-600">
    {{ $slot }}
</x-buttons.base>