<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ArticleForm;

class ArticleCreate extends AdminComponent
{
    public ArticleForm $form;

    public function create(): void
    {
        $this->form->create();
    
        $this->redirect(route('dashboard'), navigate: true);
    }

    #[Title('Create Article')]
    public function render()
    {
        return view('livewire.article-form')->with(['action' => 'create']);
    }
}
