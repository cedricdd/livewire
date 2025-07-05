<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{
    public string $name = 'John';

    public function changeName(string $newName): void
    {
        $this->name = $newName;
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
