<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Article;

class ArticleForm extends Form
{
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
}
