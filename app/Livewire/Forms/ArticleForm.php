<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Article;

const FIELDS = [
    'title' => 'required|bail|string|max:255|min:3',
    'content' => 'required|bail|string|min:100',
    'published' => 'required|boolean',
    'notifications' => 'sometimes|bail|array|max:3|in:push,email,sms',
];

class ArticleForm extends Form
{
    public ?Article $article = null;
    public string $title = '';
    public string $content = '';
    public bool $published = false;
    public ?array $notifications = [];
    public bool $allowNotifications = false;

    public function rules(): array {
        return FIELDS;
    }

    public function create(): void
    {
        $this->validate();

        $article = new Article();

        if(!$this->allowNotifications) $this->notifications = [];
        
        foreach(FIELDS as $field => $filler) $article->{$field} = $this->{$field};

        $article->save();

        session()->flash('message', 'Article created successfully!');
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;

        foreach(FIELDS as $field => $filler) $this->{$field} = $article->{$field};

        $this->allowNotifications = !empty($article->notifications);
    }   

    public function update(): void
    {
        $this->validate();

        if ($this->article) {
            if(!$this->allowNotifications) $this->notifications = [];

            foreach(FIELDS as $field => $filler) $this->article->{$field} = $this->{$field};

            $this->article->save();
        }

        session()->flash('message', 'Article updated successfully!');
    }
}
