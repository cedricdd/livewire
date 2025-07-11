@props([])

<button {{ $attributes->merge(['class' => "rounded-sm px-3 py-1 m-1 cursor-pointer min-w-[100px] text-center font-semibold border border-transparent"]) }}>{{ $slot }}</button>