<?php

namespace App\Livewire;

use App\Models\Article;
use App\Livewire\Forms\ArticleForm;

class ArticleEdit extends AdminComponent
{
    public ArticleForm $form;

    public function mount(Article $article): void
    {
        $this->form->setArticle($article);
    }

    public function update(): void
    {
        $this->form->update();

        $this->redirect(route('dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.article-form')->with(['action' => 'update'])->title('Edit Article: ' . $this->form->article->title);
    }
}
