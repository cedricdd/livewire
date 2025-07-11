@props([])

<x-link-button.base {{ $attributes }} class="bg-green-600 enabled:hover:bg-green-800 enabled:hover:border-green-600">
    {{ $slot }}
</x-link-button.base>