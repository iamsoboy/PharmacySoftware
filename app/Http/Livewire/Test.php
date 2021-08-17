<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pharmacy\Drug;

class Test extends Component
{
    public $all_drugs, $drug;
    public $count = 0;
    public $selected = '';
    public $i = 1;
    public $entries = [];


    public function render()
    {
        $this->all_drugs = Drug::all();
        return view('livewire.test');
    }

    public function updated()
    {
        $this->entries[] = '';
        $this->drug = $this->all_drugs->where('code_no', $this->selected)->first();
        dd($this->drug, $this->entries);
    }


}
