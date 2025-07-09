<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndex extends Component
{
    public function render()
    {
        return view('livewire.article-index')->with([
            'articles' => Article::orderBy('title', 'asc')->paginate(10)
        ])->extends('layouts.app');
    }
}
