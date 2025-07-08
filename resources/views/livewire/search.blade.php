<div class="inline-block my-12 relative">
    <div class="text-lg">
        <input type="text" wire:model.live.debounce.400ms="search" placeholder="Search articles..."
            class="rounded-md w-screen max-w-[500px] placeholder-white border border-white/50 px-4 py-2 my-4" />
        <button wire:click="clearSearch()" class="rounded-md px-4 py-2 border @if($search) cursor-pointer bg-white text-black @else cursor-not-allowed text-white @endif">Clear</button>
    </div>
    <div class="absolute left-0 right-0 border border-indigo-600 rounded-md bg-dark p-1 max-h-[300px] overflow-auto @if(!$search) hidden @endif">
        @forelse ($articles as $article)
            <a class="py-2 px-4 mb-2 block hover:bg-white/20 rounded-sm" href="{{ route('articles.show', $article->id) }}">
                <p class="font-bold">{{ $article->title }}</p>
            </a>
        @empty
            <p class="text-gray-300 py-2 px-4">No articles found.</p>
        @endforelse
    </div>
</div>
