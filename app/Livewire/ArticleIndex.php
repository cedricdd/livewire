<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Title;

class ArticleIndex extends Component
{
    #[Title('Articles')]
    public function render()
    {
        return view('livewire.article-index')->with([
            'articles' => Article::orderBy('title', 'asc')->paginate(10)
        ]);
    }
}
