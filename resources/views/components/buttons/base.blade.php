@props(['disable' => false])

<button {{ $attributes->merge(['class' => "rounded-sm px-3 py-1 m-1 enabled:cursor-pointer min-w-[100px] text-center font-semibold border border-transparent disabled:opacity-50"]) }} {{ $disable ? "disabled" : "" }}>{{ $slot }}</button>