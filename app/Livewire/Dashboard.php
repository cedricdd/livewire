<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Session;
use Illuminate\Database\Query\Builder;

class Dashboard extends AdminComponent
{
    use WithPagination;

    #[Session(key: 'showAllArticlesDashboard')]
    public bool $showAll = true;
    
    public function delete(Article $article): void
    {
        $article->delete();

        session()->flash('message', 'Article deleted successfully!');
    }

    #[Title('Dashboard')]
    public function render()
    {
        $articles = Article::latest();
        
        if(!$this->showAll) $articles->unPublished();

        return view('livewire.dashboard')->with([
            'title' => 'Dashboard',
            'articles' => $articles->paginate(10, pageName: 'articles-page'),
            'unPublishedCount' => Article::unPublished()->count(),
        ]);
    }

    public function setShowAll(bool $showAll): void
    {
        $this->showAll = $showAll;
        $this->resetPage(pageName: 'articles-page');
    }
}
