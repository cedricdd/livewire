<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Greeting;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class Greeter extends Component
{
    public string $name = '';
    public string $greeting = '';
    public Collection $greetings;
    public string $message = '';
    public string $instant = '';

    public function changeGreeting(): void{
        $this->reset('message');

        $this->validate();

        $this->message = $this->greeting . ' ' . $this->name . '!';
    }

    public function rules(): array {
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
    public function mount(): void {
        $this->greetings = Greeting::pluck('greeting');
        $this->greeting = $this->greetings->first(); // Set a default greeting
    }

    public function updatedName(string $value): void
    {
        $this->name = ucfirst($value);
    }   

    public function render(): View
    {
        return view('livewire.greeter');
    }
}
