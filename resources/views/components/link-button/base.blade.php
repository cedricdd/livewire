@props([])

<a wire:navigate {{ $attributes->merge(['class' => "inline-block rounded-sm px-3 py-1 m-1 cursor-pointer min-w-[100px] text-center font-semibold border border-transparent"]) }}>{{ $slot }}</a>