<div class="m-auto w-full max-w-[900px] px-4 mb-6">
    <div id="top"></div>

    <div class="mb-4 flex justify-end">
        <x-buttons.white wire:click="setShowAll(1)" :disable="$showAll">Show All Articles</x-buttons.white>
        <x-buttons.white wire:click="setShowAll(0)" :disable="!$showAll">Show UnPublished ({{ $unPublishedCount }})</x-buttons.white>
    </div>

    @session('message')
        <div>
            {{ session('message') }}
        </div>
    @endsession

    @foreach ($articles as $article)
        <div class="mb-6 group block bg-white/10 hover:bg-white/20 border border-transparent hover:border-white rounded-sm p-4"
            wire:key="article-{{ $article->id }}">
            <a wire:navigate.hover href="{{ route('articles.show', $article->id) }}">
                <h2 class="text-xl font-bold group-hover:underline">{{ $article->title }}</h2>
            </a>
            <p class="text-gray-400 mt-1">{{ $article->created_at->format('F j, Y') }}{!! !$article->published ? ' -- <i>Not Published Yet!</i>' : '' !!}</p>
            <p class="text-gray-400 mt-1">
                Notification:
                {{ $article->notifications ? implode(', ', array_map('strtoupper', $article->notifications)) : 'None' }}
            </p>
            <p class="text-gray-400 mt-2 text-justify">{{ str($article->content)->words(50) }}</p>
            <div class="flex justify-end">
                <x-link-button.blue href="{{ route('edit-article', $article->id) }}">Edit</x-link-button.blue>
                <x-buttons.red wire:click="delete({{ $article->id }})"
                    wire:confirm="Are you sure you want to delete this article?">Delete</x-buttons.red>
            </div>

        </div>
    @endforeach

    {{ $articles->links(data: ['scrollTo' => "div#top"]) }}
</div>
