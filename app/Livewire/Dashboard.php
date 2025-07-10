<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;

class Dashboard extends AdminComponent
{
    public function delete(Article $article): void
    {
        $article->delete();
    }

    #[Title('Dashboard')]
    public function render()
    {
        return view('livewire.dashboard')->with([
            'title' => 'Dashboard',
            'articles' => Article::latest()->paginate(10),
        ]);
    }
}
