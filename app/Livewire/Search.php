<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Search extends Component
{
     public string $search = '';

    protected $listeners = ['search:clear' => 'clear'];

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q', 'history' => true],
    ];

    public function rules(): array
    {
        return [
            'search' => 'required|string',
        ];
    }

    public function clear(): void
    {
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.search', [
            'articles' => Article::where('title', 'like', '%' . $this->search . '%')->orderBy('title', 'asc')->get(),
        ]);
    }
}
