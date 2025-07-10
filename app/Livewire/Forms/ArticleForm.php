<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Article;

const FIELDS = [
    'title' => 'string|required|max:255|min:3',
    'content' => 'string|required|min:100',
    'published' => 'boolean|required',
    'notification' => 'string|required|in:none,email,sms',
];

class ArticleForm extends Form
{
    public ?Article $article = null;
    public string $title = '';
    public string $content = '';
    public bool $published = false;
    public string $notification = 'none';

    public function rules(): array {
        return FIELDS;
    }

    public function create(): void
    {
        $this->validate();

        $article = new Article();
        
        foreach(FIELDS as $field => $filler) $article->{$field} = $this->{$field};

        $article->save();

        session()->flash('message', 'Article created successfully.');
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;

        foreach(FIELDS as $field => $filler) $this->{$field} = $article->{$field};
    }   

    public function update(): void
    {
        $this->validate();

        if ($this->article) {
            foreach(FIELDS as $field => $filler) $this->article->{$field} = $this->{$field};

            $this->article->save();
        }

        session()->flash('message', 'Article updated successfully.');
    }
}
