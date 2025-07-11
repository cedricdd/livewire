@props([])

<x-link-button.base {{ $attributes }} class="bg-white text-black enabled:hover:bg-white/90 enabled:hover:border-white">
    {{ $slot }}
</x-link-button.base>