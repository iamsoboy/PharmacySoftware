<?php

namespace App\Http\Livewire;

use App\Models\Pharmacy\Drug;
use App\Models\Retainership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class TestForm extends Component
{
    public $selectedTariff = "private_price";
    public $surname, $otherName, $gender, $consultant;
    public $age, $phone, $hospitalNo, $pharmacyNo, $clinic;
    public $message, $drugMessage  = false;

    public $name, $dosage, $unitPrice, $qty, $price, $stock, $total, $code_no;
    public $selectedDrug;
    public $grand_total;
    public $inputs = [];
    public $all_drugs = [];

    protected $listeners = ['qty' => 'updatedQty', 'price' => 'updatedPrice'];

    public function mount()
    {
        $this->all_drugs = Drug::where([
            ['private_price', '!=', null],
            ['private_price', '!=', 0]
        ])->get();
    }
    public function render()
    {
        $retainerships = Retainership::whereStatus(1)->get();
        return view('livewire.test-form', compact('retainerships'));
    }

    public function updatedselectedTariff($value)
    {
        $this->all_drugs = Drug::where([
            [$value, '!=', null],
            [$value, '!=', 0]
        ])->get();

        $this->dispatchBrowserEvent('tariff-updated', ['newName' => $this->all_drugs]);
        //dd($value, $this->all_drugs);

        $this->drugMessage = false;
    }

    public function removeDrug($id)
    {
        $this->grand_total -= $this->inputs[$id]['total'];
        unset($this->inputs[$id]);
        $this->inputs = array_values($this->inputs);
        $this->message = false;
    }

    public function updatedselectedDrug()
    {
        $drug = $this->all_drugs->where('code_no', $this->selectedDrug)->first();

        //dd($drug, $this->selectedDrug);
        if (isset($drug)) {

                array_push($this->inputs, [
                    "code_no" => $drug->id,
                    "name" => $drug->product_name,
                    "dosage" => $drug->dosage,
                    "unitPrice" => $drug->cost_price,
                    "qty" => ($drug->quantity ?? 1),
                    "price" => $drug[$this->selectedTariff],
                    "stock" => $drug->store_balance,
                    "total" => round(($drug->quantity ?? 1) * $drug[$this->selectedTariff], 3),
                ]);

                $this->grand_total += round(($drug->quantity ?? 1) * $drug[$this->selectedTariff], 3);

                $this->emit('updated', $this->inputs);


        } else{

            $this->drugMessage = true;
        }
        //dd($this->selectedDrug, $this->inputs, $this->selectedTariff, $drug);
    }


    public function updatedQty($key)
    {

        $this->inputs[$key]['total'] = round($this->inputs[$key]['qty'] * $this->inputs[$key]['price'], 3);

        $this->grand_total = 0;
        foreach ($this->inputs as $key => $item)
        {
            $this->grand_total += $item['total'];
        }

    }

    public function updatedPrice($key)
    {
        $this->inputs[$key]['total'] = round($this->inputs[$key]['qty'] * $this->inputs[$key]['price'], 3);

        $this->grand_total = 0;
        foreach ($this->inputs as $key => $item)
        {
            $this->grand_total += $item['total'];
        }
    }

    public function saveForm()
    {
        $this->message = false;

        $user = Auth::user();

        $validatedDate = $this->validate([
            'selectedTariff' => 'required|string',
            'surname' => 'required|string',
            'otherName' => 'required|string',
            'gender' => 'required|string',
            'consultant' => 'required|string',
            'inputs.*.name' => 'required|array',
            'inputs.*.dosage' => 'required|array',
            'inputs.*.unitPrice' => 'required|array',
            'inputs.*.qty' => 'required|array',
            'inputs.*.price' => 'required|array',
            'inputs.*.total' => 'required|array',
            'inputs.*.stock' => 'required|array',
        ],
            [
                'surname.required' => 'Surname field is required',
                'otherName.required' => 'Othernames field is required',
                'gender.required' => 'Gender field is required',
                'consultant.required' => 'Consultant field is required',
                'inputs.*.required' => 'All drugs field(s) is required',
            ]
        );
        dd($this->inputs, $user);
    }

    private function generatePharmacyNumber()
    {
        $random = strtoupper(Str::random(5));
        return $value = "HBMC/PHM/".$random;
    }
}
