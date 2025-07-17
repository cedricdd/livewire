<div class="inline-block relative">
    <div>
        <input type="text" wire:model.live.debounce.400ms="search" placeholder="Search articles..."
            class="rounded-md w-screen max-w-[500px] placeholder-white border border-white/50 px-4 py-1.5" />
    </div>
    @if(!empty($search))
    <div wire:transition.in.duration.500ms wire:transition.out.opacity.duration.500ms class="absolute left-0 right-0 border border-indigo-600 rounded-md bg-dark p-1 max-h-[400px] overflow-auto">
        @forelse ($articles as $article)
            <a wire:navigate.hover class="py-2 px-4 mb-2 block hover:bg-white/20 rounded-sm" href="{{ route('articles.show', $article->id) }}">
                <p class="font-bold">{{ $article->title }}</p>
            </a>
        @empty
            <p class="text-gray-300 py-2 px-4">No articles found.</p>
        @endforelse
    </div>
    @endif
</div>
