<?php

namespace App\Http\Livewire;

use App\Models\Pharmacy\Dispense;
use App\Models\Pharmacy\Drug;
use App\Models\Pharmacy\Prescription;
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

        //$this->dispatchBrowserEvent('tariff-updated', ['newName' => $this->all_drugs]);
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
            'inputs.*.name' => 'required|string',
            'inputs.*.dosage' => 'required|string',
            'inputs.*.unitPrice' => 'required|numeric',
            'inputs.*.qty' => 'required|numeric',
            'inputs.*.price' => 'required|numeric',
            'inputs.*.total' => 'required|numeric',
            'inputs.*.stock' => 'required',
        ],
            [
                'surname.required' => 'Surname field is required',
                'otherName.required' => 'Other names field is required',
                'gender.required' => 'Gender field is required',
                'consultant.required' => 'Consultant field is required',
                'inputs.*.name.required' => 'Drug name field is required',
                'inputs.*.dosage.required' => 'Drug dosage is required',
                'inputs.*.unitPrice.required' => 'Cost price is required',
                'inputs.*.qty.required' => 'Drug quantity field is required',
                'inputs.*.price.required' => 'Drug selling price is required',
                'inputs.*.total.required' => 'Drug total selling cost is required',
                'inputs.*.stock.required' => 'Drug is required',
            ]
        );

        $dispense = Dispense::create([
            'prescription_no' => $this->generatePharmacyNumber(),
            'hospital_no' => $this->hospitalNo ?? "Walk-In Patient",
            'prescription_date' => now(),
            'surname' => $this->surname,
            'other_names' => $this->otherName,
            'age' => $this->age,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'retainership' => $this->selectedTariff,
            'ward_clinic' => $this->clinic,
            'consultant' => $this->consultant,
            'dispensed_by' => $user->name,

        ]);

        foreach ($this->inputs as $key => $item) {

            //dd($dispense, $dispense->id);
            Prescription::create([
                'dispense_id' => $dispense->id,
                'code_no' => $item['code_no'],
                'drug_name' => $item['name'],
                'cost_price' => $item['unitPrice'],
                'sale_price' => $item['price'],
                'dosage_regimen' => $item['dosage'],
                'quantity_prescribed' => $item['qty'],
                'subtotal_prescribed' => $item['total'],
            ]);

            $drug = Drug::where('id', $item['code_no'])->first();
            $drug->store_balance =  ($drug->store_balance - $item['qty']);
            $drug->save();

        }
        $this->message = true;
        $this->inputs = [];
    }

    private function generatePharmacyNumber()
    {
        $random = strtoupper(Str::random(5));
        return $value = "HBMC/PHM/".$random;
    }
}
