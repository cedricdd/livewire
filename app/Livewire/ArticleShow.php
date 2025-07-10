<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ArticleShow extends Component
{
    public Article $article;
    
    public function render(): View
    {
        return view('livewire.article-show');
    }
}
