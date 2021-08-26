<?php

namespace App\Http\Controllers\Pharmacy\Drug;

use App\Http\Controllers\Controller;
use App\Models\DrugExtract;
use App\Models\Pharmacy\Drug;
use App\Models\Pharmacy\DrugAllergyGroup;
use App\Models\Pharmacy\DrugCategory;
use App\Models\Pharmacy\DrugFormulation;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::all();
        return view('pharmacy.drug.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allergyGroups = DrugAllergyGroup::all();
        $categories = DrugCategory::all();
        $formulations = DrugFormulation::all();

        return view('pharmacy.drug.create', compact('categories', 'formulations', 'allergyGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Drug::all()->last()->id;

        $this->validateRequest();

        //dd($this->getDosage($request->dose, $request->unit, $request->frequency, $request->duration, $request->time));

        Drug::create([
            'code_no' => "DRF/".($id + 1),
            'product_name' => $request->name,
            'generic_name' => $request->brandName,
            'category' => $request->category,
            'formulation' => $request->formulation,
            'allergy_group' => $request->allergy,
            'expiry_date' => $request->expiry_date,
            'description' => $request->description,
            'revenue_fund' => "DRUG REVOLVING FUND",
            'revenue_class' => "DRUG FEES",
            'instructions' => $request->instruction,
            'indications' => $request->indication,
            'mechanisms' => $request->mechanism,
            'contra_indications' => $request->contraIndication,
            'precautions' => $request->precaution,
            'adverse_effects' => $request->sideEffect,
            'drug_interactions' => $request->drugInteraction,
            'dose' => $request->dose,
            'unit' => $request->unit,
            'frequency' => $request->frequency,
            'duration' => $request->duration,
            'time' => $request->time,
            'dosage' => $this->getDosage($request->dose, $request->unit, $request->frequency, $request->duration, $request->time),
            'unit_pack' => $request->unitPack,
            'quantity' => $request->quantity,
            'cost_price' => $request->costPrice,
            'retail_price' => $request->salePrice,
            'private_price' => $request->salePrice,
            'brookstone_price' => $request->salePrice,
            'status' => 1,
        ]);

        return back()->with('success_message', 'New Drug created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drug = Drug::whereId($id)->firstOrFail();
        $allergyGroups = DrugAllergyGroup::all();
        $categories = DrugCategory::all();
        $formulations = DrugFormulation::all();
        return view('pharmacy.drug.edit', compact('drug', 'allergyGroups', 'categories', 'formulations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $drug = Drug::whereId($id)->firstOrFail();
            $drug->product_name = $request->name ;
            $drug->generic_name = $request->brandName ;
            $drug->category = $request->category ;
            $drug->formulation = $request->formulation;
            $drug->allergy_group = $request->allergy;
            $drug->expiry_date = $request->expiry_date;
            $drug->description = $request->description;
            $drug->instructions = $request->instruction;
            $drug->indications = $request->indication;
            $drug->mechanisms = $request->mechanism;
            $drug->contra_indications = $request->contraIndication;
            $drug->precautions = $request->precaution;
            $drug->adverse_effects = $request->sideEffect;
            $drug->drug_interactions = $request->drugInteraction;
            $drug->dose = $request->dose;
            $drug->unit = $request->unit;
            $drug->frequency = $request->frequency;
            $drug->duration = $request->duration;
            $drug->time = $request->time;
            $drug->dosage = $this->getDosage($request->dose, $request->unit, $request->frequency, $request->duration, $request->time);
            $drug->unit_pack = $request->unitPack;
            $drug->quantity= $request->quantity;
            $drug->cost_price = $request->costPrice;
            $drug->retail_price = $request->salePrice;
            $drug->private_price = $request->salePrice;
            $drug->brookstone_price = $request->salePrice;
            if ($request->has('show')) {
                $drug->status = 1;
            } else {
                $drug->status = 0;
            }
            $drug->save();
        return back()->with('success_message', 'Drug updated successfully.');
    }

    /**
     * Change the specified resource status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $drug = Drug::whereId($id)->firstOrFail();
        $drug->status = 1;
        $drug->save();
        return back();
    }

    public function deactivate($id)
    {
        $drug = Drug::whereId($id)->firstOrFail();
        $drug->status = 0;
        $drug->save();
        return back();
    }

    private function getUnit($unit)
    {
         if ($unit == "Tablets") {
             return $unit = "Tab";
         } elseif ($unit == "mLs/Dose") {
             return $unit = "mLs";
         } elseif ($unit == "mg/Dose") {
             return $unit = "mg";
         } elseif ($unit == "Capsules") {
             return $unit = "Cap";
         } elseif ($unit == "Drops") {
             return $unit = "Drops";
         } elseif ($unit == "Ampules") {
             return $unit = "Ampules";
         } elseif ($unit == "PUFF") {
             return $unit = "PUFF";
         } elseif ($unit == "OVULE") {
             return $unit = "OVULE";
         } else {
             return NULL;
         }
    }

    private function getTime($time)
    {
        if ($time == "Days") {
            return $time = 7;
        } elseif ($time == "Weeks") {
            return $unit = 52;
        } else {
            return NULL;
        }
    }

    public function getDosage($dose, $unit, $frequency, $duration, $time)
    {
        if ($dose == Null || $unit ==null || $frequency ==null || $duration==null || $time ==null) {
            return null;
        } else {
            return $dose." ".$this->getUnit($unit)." ".$frequency. " X " . $duration."/".$this->getTime($time);
        }

    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'expiry_date' => 'required|string',
            'quantity' => 'required|string',
            'costPrice' => 'required|string',
            'salePrice' => 'required|string',
        ]);
    }

    public function dumprecords()
    {
        //dd('Here');

        $drugs = DrugExtract::all();

        dd($drugs);

        foreach ($drugs as $item){
            //dd($item);
            $newtable = Drug::create([

                'code_no' => $item->code_no,
                'product_name' => $item->product_name,
                'generic_name' => $item->generic_name,
                'description' => $item->description,
                'prescription' => $item->prescription,

                'expiry_date'=> $item->expiry_date,
                'arrival_date' => $item->arrival_date,
                'supplier' => $item->supplier,

                'store_balance' => $item->storeA_balance,
                'reorder_level' => $item->reorder_level,
                'revenue_fund' => $item->revenue_fund,
                'revenue_class' => $item->revenue_class,

                'formulation' => $item->formulation,
                'section' => $item->section,
                'allergy_group'=> $item->allergy_group,
                'category' => $item->category,

                'unit_pack' => $item->unit_pack,
                'cost_price' => $item->unit_price,
                'quantity' => $item->quantity,
                'retail_price' => $item->retail_price,


                'unit' => $item->unit,
                'strength'=> $item->drf_unit,
                'dose' => $item->dose,
                'dose_unit' => $item->unit_dose,
                'frequency' => $item->frequency,
                'time' => $item->time,
                'duration' => $item->duration,
                'dosage' => $item->dosage,

                'brookstone_price'=> $item->retail_price,
                'private_price' => $item->retail_price,
            ]);
        }

        echo "Congrats";
    }
}
