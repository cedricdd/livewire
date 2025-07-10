<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;

class CreateArticle extends AdminComponent
{
    public string $title = '';
    public string $content = '';

    public function rules(): array {
        return [
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:100',
        ];
    }

    public function createArticle(): void
    {
        $this->validate();

        $article = new Article();
        $article->title = $this->title;
        $article->content = $this->content;
        $article->save();

        session()->flash('message', 'Article created successfully.');
    
        $this->redirect(route('dashboard'), navigate: true);
    }

    #[Title('Create Article')]
    public function render()
    {
        return view('livewire.create-article');
    }
}
