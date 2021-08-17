<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestForm extends Component
{
    public $name;

    protected $listeners = ['drugSelected' => 'mount'];

    public function mount($drugName)
    {
        $this->name = $drugName;
    }
    public function render()
    {
        return view('livewire.test-form');
    }
}
