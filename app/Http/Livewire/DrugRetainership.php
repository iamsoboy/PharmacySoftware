<?php

namespace App\Http\Livewire;

use App\Models\Pharmacy\Drug;
use App\Models\Retainership;
use Livewire\Component;

class DrugRetainership extends Component
{
    public $templates = [];
    public $all_drugs;
    public $tables = [''];
    public $saved = false;

    public function mount()
    {
        $this->all_drugs = Drug::all();
    }

    public function render()
    {
        $retainerships = Retainership::where('status', 1)->get();
        return view('livewire.drug-retainership', compact('retainerships'));
    }

    public function addTable()
    {
        $this->tables[] = '';
    }

    public function removeTable($key)
    {
        unset($this->tables[$key]);
        $this->tables = array_values($this->tables);
    }

    public function updated($key, $value)
    {
        $parts = explode(".", $key);
        if(count($parts)==2 & $parts[0]== "templates") {
            $drug = $this->all_drugs->where('code_no', $value)->first();

            if ($drug) {
                $this->tables[$parts[1]] = [
                    'private' => $drug->private_price,
                    'brookstone' => $drug->brookstone_price,
                    'agip' => $drug->agip_price,
                    'belema' => $drug->belema_price,
                    'axamansard' => $drug->axamansard_price,
                    'avon' => $drug->avon_price,
                    'novo' => $drug->novo_price,
                    'hygeia' => $drug->hygeia_price,
                    'hallmark' => $drug->hallmark_price,
                    'venus' => $drug->venus_price,
                    'regenix' => $drug->regenix_price,
                    'reliance' => $drug->reliance_price,
                    'greenocean' => $drug->greenocean_price,
                    'leadway' => $drug->leadway_price,
                    'tht' => $drug->tht_price,
                    'abua' => $drug->abua_price,
                ];
            }
        }
    }

    public function saveForm()
    {
        foreach ($this->templates as $code) {
            $drug = $this->all_drugs->where('code_no', $code)->first();

            foreach ($this->tables as $prices) {
                $drug->private_price = $prices['private'];
                $drug->brookstone_price = $prices['brookstone'];
                $drug->agip_price = $prices['agip'];
                $drug->belema_price = $prices['belema'];
                $drug->axamansard_price = $prices['axamansard'];
                $drug->avon_price = $prices['avon'];
                $drug->novo_price = $prices['novo'];
                $drug->hygeia_price = $prices['hygeia'];
                $drug->hallmark_price = $prices['hallmark'];
                $drug->venus_price = $prices['venus'];
                $drug->regenix_price = $prices['regenix'];
                $drug->reliance_price = $prices['reliance'];
                $drug->greenocean_price = $prices['greenocean'];
                $drug->leadway_price = $prices['leadway'];
                $drug->tht_price = $prices['tht'];
                $drug->abua_price = $prices['abua'];
                $drug->save();
            }

        }
        $this->saved = true;
        $this->reset('tables', 'templates');
        //dd($this->tables, $this->templates, $drug, $this->tables['0']['private']);
    }
}
