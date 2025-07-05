<div>
    <div class="mt-2">
        <select class="p-4 rounded-md bg-gray-700 w-full" wire:model.fill.change="greeting">
            <option value="Hello">Hello</option>
            <option value="Hi">Hi</option>
            <option value="Hey">Hey</option>
            <option value="Howdy">Howdy</option>
        </select>
    </div>
    <div class="mt-2">
        <input type="text" class="rounded-md px-4 py-2 border w-full mb-4 bg-white/5" wire:model.live.debounce.500ms="name" placeholder="Enter Name" />
    </div>

    @if($name !== '')
        <div class="mt-4">
            <p class="text-sm text-gray-400">
                {{ $greeting }}, {{ $name }}!
            </p>
        </div>
    @endif
</div>
