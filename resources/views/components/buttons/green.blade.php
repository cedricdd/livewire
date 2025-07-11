@props([])

<x-buttons.base {{ $attributes }} class="bg-green-600 enabled:hover:bg-green-800 enabled:hover:border-green-600">
    {{ $slot }}
</x-buttons.base>