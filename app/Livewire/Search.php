<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Collection;

class Search extends Component
{
    public string $search = '';
    public Collection $articles;

    protected $listeners = ['search:clear' => 'clear'];

    public function rules(): array
    {
        return [
            'search' => 'required|string',
        ];
    }

    public function mount(): void
    {
        $this->articles = collect();
    }

    public function updatedSearch(): void
    {
        $this->reset('articles');

        $this->validate();

        $this->articles = Article::where('title', 'like', '%' . $this->search . '%')->orderBy('title', 'asc')->get();
    }   

    public function clear(): void
    {
        $this->search = '';
        $this->articles = collect();
    }

    public function render()
    {
        return view('livewire.search');
    }
}
