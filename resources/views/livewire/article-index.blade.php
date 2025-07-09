<div class="m-auto w-full max-w-[900px] px-4">
    @foreach ($articles as $article)
        <div class="mb-6 group" wire:key="article-{{ $article->id }}">
            <a wire:navigate.hover class="block bg-white/10 hover:bg-white/20 border border-transparent hover:border-white rounded-sm p-4" href="{{ route('articles.show', $article->id) }}">
                <h2 class="text-xl font-bold group-hover:underline">{{ $article->title }}</h2>
                <p class="text-gray-400 mt-1">{{ $article->created_at->format('F j, Y') }}</p>
                <p class="text-gray-400 mt-2 text-justify">{{ str($article->content)->words(50) }}</p>
            </a>
        </div>
    @endforeach

    {{ $articles->links() }}
</div>
