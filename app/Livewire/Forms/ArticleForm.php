<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Article;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

const FIELDS = ['title', 'content', 'published', 'notifications'];

class ArticleForm extends Form
{
    public ?Article $article = null;
    public string $title = '';
    public string $content = '';
    public bool $published = false;
    public ?array $notifications = [];
    public bool $allowNotifications = false;
    public ?object $photo = null;

    public function rules(): array
    {
        return [
            'title' => 'required|bail|string|max:255|min:3',
            'content' => 'required|bail|string|min:100',
            'published' => 'required|boolean',
            'notifications' => 'sometimes|bail|array|max:3|in:push,email,sms',
            'photo' => 'nullable|bail|image|max:4096|mimes:jpeg,png,jpg,gif,webp',
        ];
    }

    public function create(): void
    {
        $this->validate();

        $article = new Article();

        if (!$this->allowNotifications)
            $this->notifications = [];

        foreach (FIELDS as $field)
            $article->{$field} = $this->{$field};

        $article->save();

        // We use the article ID to store the photo with a unique name, need to wait until the article is saved
        if ($this->photo) {
            $article->photo_path = $this->photo->storeAs('photos', $article->id . "." . $this->photo->extension(), ['disk' => 'public']);
            $article->save();
        }

        session()->flash('message', 'Article created successfully!');
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;

        foreach (FIELDS as $field)
            $this->{$field} = $article->{$field};

        $this->allowNotifications = !empty($article->notifications);
    }

    public function update(): void
    {
        $this->validate();

        if ($this->article) {
            if (!$this->allowNotifications)
                $this->notifications = [];

            if ($this->photo) {
                $newPath = $this->photo->storeAs('photos', $this->article->id . "." . $this->photo->extension(), ['disk' => 'public']);

                // There's already a photo path, delete the old one if it's not the same extension as the new one
                if($this->article->photo_path && $this->article->photo_path !== $newPath) {
                    Storage::disk('public')->delete($this->article->photo_path);
                }

                $this->article->photo_path = $newPath;
            }

            foreach (FIELDS as $field)
                $this->article->{$field} = $this->{$field};

            $this->article->save();
        }

        session()->flash('message', 'Article updated successfully!');
    }
}
