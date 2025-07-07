<div>
    <div>
        <input type="text" class="rounded-md px-4 py-2 border w-full mb-4 bg-white/5 placeholder-white"
            wire:model.live.debounce.500ms="instant" placeholder="Type Here - Instant Update" />
        <p>
            {{ $instant }}
        </p>
    </div>
    <hr class="my-8">

    <form action="" wire:submit="changeGreeting">
        <div class="mt-2">
            <select
                class="border rounded-lg block w-full p-2.5 bg-black/60 border-gray-600 placeholder-gray-400 focus:border-blue-500"
                wire:model.fill.defer="greeting">
                @foreach ($greetings as $greeting)
                    <option value="{{ $greeting }}">{{ $greeting }}</option>
                @endforeach
            </select>
        </div>
        @error('greeting')
            <div class="text-red-500 text-sm my-2">{{ $message }}</div>
        @enderror
        <div class="mt-2">
            <input type="text" class="rounded-md px-4 py-2 border w-full bg-white/5 placeholder-white"
                wire:model.defer="name" placeholder="Enter Name" />
        </div>
        @error('name')
            <div class="text-red-500 text-sm my-2">{{ $message }}</div>
        @enderror
        <button
            class="mt-2 border border-blue-600 rounded-md py-2 px-4 bg-blue-500 hover:bg-blue-700 font-bold cursor-pointer"
            type="submit">Submit</button>
    </form>

    @if (!empty($message))
        <div class="mt-4 text-lg">
            {{ $message }}
        </div>
    @endif
</div>
