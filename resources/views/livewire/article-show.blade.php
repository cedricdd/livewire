<div class="mx-auto w-full max-w-[900px] px-4">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-400 mb-6">{{ $article->created_at->format('F j, Y') }}</p>
        <div class="text-justify">
            {{ $article->content }}
        </div>
    </div>