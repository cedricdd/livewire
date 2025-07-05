<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{
    public string $name = '';
    public string $greeting = '';

    public function changeName(): void{}

    public function render()
    {
        return view('livewire.greeter');
    }
}
