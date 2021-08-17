<?php

namespace App\Http\Livewire;

use App\Models\Pharmacy\Drug;
use App\Models\Retainership;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Livewire\Component;

class DispenseForm extends Component
{
    public $all_drugs = [];
    public $message, $drugMessage  = false;
    public $selectedDrug;
    public $cartItems = [];
    public $selectedTariff = "private_price";


    protected $listeners = [
        'increment' => 'updateQuantityIncrease',
        'decrement' => 'updateQuantityDecrease',
        //'tariffSelected' => 'getDrugs'
    ];

    public function updatedselectedTariff($value)
    {
        $this->all_drugs = Drug::where([
            [$value, '!=', null],
            [$value, '!=', 0]
        ])->get();
        //dd($this->all_drugs);
        //$this->all_drugs = Drug::where($value, $value)->get();
        $this->drugMessage = false;
    }


    public function mount()
    {
        $this->all_drugs = Drug::where([
            ['private_price', '!=', null],
            ['private_price', '!=', 0]
        ])->get();
        //dd($this->all_drugs);
    }

    public function render()
    {
        $retainerships = Retainership::whereStatus(1)->get();
        return view('livewire.dispense-form', compact('retainerships'));
    }


    public function updatedselectedDrug()
    {

        $drug = $this->all_drugs->where('product_name', $this->selectedDrug)->first();

        //$price = Drug::select($this->selectedTariff)->where('product_name', $this->selectedDrug)->first();


        //$gen = $price->toArray();
        //dd($this->selectedTariff, $price, $gen, $price[$this->selectedTariff], $drug[$this->selectedTariff]);

        if (isset($drug)) {
            $duplicates = Cart::search(function ($cartItem, $rowId) use ($drug) {
                return $cartItem->id === $drug->code_no;
            });

            if ($duplicates->isEmpty()) {
                Cart::add([
                    'id' => $drug->code_no,
                    'name' => $drug->product_name,
                    'qty' => $drug->quantity ?? 1,
                    'price' => $drug[$this->selectedTariff],
                    'weight' => 1,
                    'options' => [
                        'unitPrice' => $drug->cost_price,
                        'stock' => $drug->store_balance,
                        'dosage' => $drug->dosage,
                        'total' => (($drug->quantity ?? 1) * $drug[$this->selectedTariff])
                    ]
                ]);
                $this->drugMessage = false;
            } else {
                $this->message = true;
            }
        } else{

            $this->drugMessage = true;
        }
    }

    public function removeDrug($id)
    {
        $this->message = false;
        Cart::remove($id);
    }

    public function updateQuantityIncrease($id)
    {
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        foreach ($cartItem as $item) {
            $newQty = $item->qty + 1;
            $newtotal = ($item->price * $newQty);
            $rowId = $item->rowId;
            $unitPrice = $item->options['unitPrice'];
            $stock = $item->options['stock'];
            $dosage = $item->options['dosage'];
            $rowId = $item->rowId;
        }
        Cart::update($rowId,
            ['qty' => $newQty,
            'options'  => [
                            'total' => $newtotal,
                            'unitPrice' => $unitPrice,
                            'stock' => $stock,
                            'dosage' => $dosage]
        ]);
    }

    public function updateQuantityDecrease($id)
    {
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        foreach ($cartItem as $item) {
            $newQty = $item->qty - 1;
            $newtotal = ($item->price * $newQty);
            $rowId = $item->rowId;
            $unitPrice = $item->options['unitPrice'];
            $stock = $item->options['stock'];
            $dosage = $item->options['dosage'];
            $rowId = $item->rowId;
        }
        Cart::update($rowId,
            ['qty' => $newQty,
                'options'  => [
                    'total' => $newtotal,
                    'unitPrice' => $unitPrice,
                    'stock' => $stock,
                    'dosage' => $dosage]
            ]);
    }

}
