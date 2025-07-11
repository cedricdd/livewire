@props([])

<x-link-button.base {{ $attributes }} class="bg-blue-600 enabled:hover:bg-blue-800 enabled:hover:border-blue-600">
    {{ $slot }}
</x-link-button.base>