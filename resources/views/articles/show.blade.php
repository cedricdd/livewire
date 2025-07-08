@extends('layouts.app')

@section('content')
    <div class="w-full text-center">
        @livewire('search')
    </div>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-400 mb-6">{{ $article->created_at->format('F j, Y') }}</p>
        <div class="prose prose-invert">
            {{ $article->content }}
        </div>
    </div>
@endsection
