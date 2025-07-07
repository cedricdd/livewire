<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;

const GREETINGS = [
    'Hello',
    'Hi',
    'Greetings',
    'Welcome',
    'Salutations',
];

class Greeter extends Component
{
    public string $name = '';
    public string $greeting = '';
    public string $message = '';
    public string $instant = '';

    public function changeGreeting(){
        $this->reset('message');

        $this->validate();

        $this->message = $this->greeting . ' ' . $this->name . '!';
    }

    public function rules() {
        return [
            'greeting' => ['required', 'string', Rule::in(GREETINGS)],
            'name' => 'required|string|min:2|max:50',
        ];
    }

    public function render()
    {
        return view('livewire.greeter', [
            'greetings' => GREETINGS,
        ]);
    }
}
