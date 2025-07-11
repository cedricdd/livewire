<div class="m-auto w-full max-w-[900px] px-4 mb-6">
    @foreach ($articles as $article)
        <div class="mb-6 group block bg-white/10 hover:bg-white/20 border border-transparent hover:border-white rounded-sm p-4"
            wire:key="article-{{ $article->id }}">
            <a wire:navigate.hover href="{{ route('articles.show', $article->id) }}">
                <h2 class="text-xl font-bold group-hover:underline">{{ $article->title }}</h2>
            </a>
            <p class="text-gray-400 mt-1">{{ $article->created_at->format('F j, Y') }}{!! !$article->published ? " -- <i>Not Published Yet!</i>" : "" !!}</p>
            <p class="text-gray-400 mt-1">
                Notification: {{ $article->notifications ? implode(', ', array_map('strtoupper', $article->notifications)) : 'None' }}
            </p>
            <p class="text-gray-400 mt-2 text-justify">{{ str($article->content)->words(50) }}</p>
            <div class="flex justify-end">
                <a href="{{ route('edit-article', $article->id) }}"
                    class="border border-blue-500 rounded-sm px-2 py-1 m-1 bg-blue-600 hover:bg-blue-800 cursor-pointer">Edit</a>
                <button wire:click="delete({{ $article->id }})"
                    wire:confirm="Are you sure you want to delete this article?"
                    class="border border-red-500 rounded-sm px-2 py-1 m-1 bg-red-600 hover:bg-red-800 cursor-pointer">Delete</button>
            </div>

        </div>
    @endforeach

    {{ $articles->links() }}
</div>
