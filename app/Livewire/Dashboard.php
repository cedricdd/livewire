<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class Dashboard extends AdminComponent
{
    use WithPagination;

    public bool $showAll = true;
    
    public function delete(Article $article): void
    {
        $article->delete();
    }

    #[Title('Dashboard')]
    public function render()
    {
        $articles = $this->showAll
            ? Article::latest()->paginate(10)
            : Article::unPublished()->latest()->paginate(10);

        return view('livewire.dashboard')->with([
            'title' => 'Dashboard',
            'articles' => $articles,
            'unPublishedCount' => Article::unPublished()->count(),
        ]);
    }

    public function setShowAll(bool $showAll): void
    {
        $this->showAll = $showAll;
        $this->resetPage();
    }
}
