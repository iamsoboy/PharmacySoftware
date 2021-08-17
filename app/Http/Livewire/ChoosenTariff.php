<?php

namespace App\Http\Livewire;

use App\Models\Retainership;
use Livewire\Component;

class ChoosenTariff extends Component
{
    public $selectedTariff;

    public function mount()
    {
        $this->selectedTariff = "private_price";
    }

    public function render()
    {
        $retainerships = Retainership::whereStatus(1)->get();
        return view('livewire.choosen-tariff', compact('retainerships'));
    }

    public function updated()
    {
        $this->emitUp('tariffSelected', $this->selectedTariff);
    }
}
