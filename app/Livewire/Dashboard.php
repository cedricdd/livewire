<?php

namespace App\Livewire;

use App\Models\Article;

class Dashboard extends AdminComponent
{
    public function delete(Article $article): void
    {
        $article->delete();
    }

    public function render()
    {
        return view('livewire.dashboard')->with([
            'articles' => Article::latest()->paginate(10),
        ]);
    }
}
