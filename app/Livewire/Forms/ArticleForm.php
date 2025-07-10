<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Article;

class ArticleForm extends Form
{
    public ?Article $article = null;
    public string $title = '';
    public string $content = '';

    public function rules(): array {
        return [
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:100',
        ];
    }

    public function create(): void
    {
        $this->validate();

        $article = new Article();
        $article->title = $this->title;
        $article->content = $this->content;
        $article->save();

        session()->flash('message', 'Article created successfully.');
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->content = $article->content;
    }   

    public function update(): void
    {
        $this->validate();

        if ($this->article) {
            $this->article->title = $this->title;
            $this->article->content = $this->content;
            $this->article->save();
        }

        session()->flash('message', 'Article updated successfully.');
    }
}
