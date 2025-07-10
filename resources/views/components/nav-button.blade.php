@props(['route'])

<a href="{{ route($route) }}" wire:navigate
    class="inline-block px-5 py-1.5 border border-[#3E3E3A] hover:border-[#62605b] rounded-sm text-sm leading-normal">
    {{ $slot }}
</a>
