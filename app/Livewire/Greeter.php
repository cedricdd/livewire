<?php

namespace App\Livewire;

use App\Models\Greeting;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Greeter extends Component
{
    public string $name = '';
    public string $greeting = '';
    public Collection $greetings;
    public string $message = '';
    public string $instant = '';

    public function changeGreeting(){
        $this->reset('message');

        $this->validate();

        $this->message = $this->greeting . ' ' . $this->name . '!';
    }

    public function rules() {
        return [
            'greeting' => ['required', 'string', Rule::in($this->greetings)],
            'name' => 'required|string|min:2|max:50',
        ];
    }

    /**
     * Mount hook
     * Runs once, immediately after the component is instantiated, but before render() is called. 
     * This is only called once on initial page load and never called again, even on component refreshes
     */
    public function mount() {
        $this->greetings = Greeting::pluck('greeting');
        $this->greeting = $this->greetings->first(); // Set a default greeting
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
