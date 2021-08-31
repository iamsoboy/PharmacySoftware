<?php

namespace App\Http\Livewire;

use App\Models\Pharmacy\Drug;
use Livewire\Component;

class DrugStock extends Component
{
    public $cost_price, $name, $quantity, $sale_price, $expiry_date;
    public $updateMode = false;
    public $inputs = [''];
    public $i = 1;

    public function render()
    {
        $all_drugs = Drug::where('status', 1)->get();
        return view('livewire.drug-stock', compact('all_drugs'));
    }

    public function addRow($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function removeRow($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->cost_price = '';
        $this->quantity = '';
        $this->sale_price = '';
        $this->expiry_date = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name.*' => 'required',
            'cost_price.*' => 'required',
            'quantity.*' => 'required',
            'sale_price.*' => 'required',
            'expiry_date.*' => 'required',
        ],
            [
                'name.*.required' => 'Drug name field is required',
                'cost_price.*.required' => 'Cost price field is required',
                'quantity.*.required' => 'Quantity field is required',
                'sale_price.*.required' => 'Sales price field is required',
                'expiry_date.*.required' => 'Expiry date field is required',
            ]
        );

        dd($validatedDate);

        foreach ($this->name as $key => $value) {
            DrugStock::create([
                'name' => $this->name[$key],
                'quantity' => $this->quantity[$key],
                'cost_price' => $this->cost_price[$key],
                'sale_price' => $this->sale_price[$key],
                'expiry_date' => $this->expiry_date[$key],
            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Drug stock has been recorded successfully.');
    }
}
