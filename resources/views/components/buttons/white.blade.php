@props([])

<x-buttons.base {{ $attributes }} class="text-black bg-white enabled:hover:bg-white/80 enabled:hover:border-white">
    {{ $slot }}
</x-buttons.base>