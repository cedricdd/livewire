<div>
    <div>
        <input type="text" wire:model.live.debounce.400ms="search" placeholder="Search articles..."
            class="rounded-md w-300 text-lg placeholder-white border border-white/50 px-4 py-2 my-4" />
        <button wire:click="clearSearch()" class="rounded-md px-4 py-2 border bg-white text-black font-bold cursor-pointer disabled:hidden" @if(!$search) disabled @endif>Clear</button>
    </div>
    <div>
        @foreach ($articles as $article)
            <div class="bg-white/10 rounded-lg p-4 mb-4">
                <h2 class="text-xl font-bold mb-2">{{ $article->title }}</h2>
                <p class="text-gray-300">{{ Str::limit($article->content, 150) }}</p>
            </div>
        @endforeach
    </div>
</div>
