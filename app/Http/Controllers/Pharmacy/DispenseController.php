<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy\Dispense;
use App\Models\Pharmacy\Drug;
use App\Models\Pharmacy\Prescription;
use App\Models\Retainership;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DispenseController extends Controller
{
    public function index()
    {
        $dispenses = Dispense::with('prescriptions')->get();
        return view('pharmacy.dispense.index', compact('dispenses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.dispense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validateRequest();
        //dd($request->all(), Cart::content());
        $dispense = Dispense::create([
                    'prescription_no' => $this->generatePharmacyNumber(),
                    'hospital_no' => $request->hospitalNo ?? "Walk-In Patient",
                    'prescription_date' => now(),
                    'surname' => $request->surname,
                    'other_names' => $request->otherName,
                    'age' => $request->age,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'retainership' => $request->retainership,
                    'ward_clinic' => $request->clinic,
                    'consultant' => $request->consultant,
                    'dispensed_by' => $user->name,

        ]);

        foreach (Cart::content() as $item) {

            Prescription::create([
                'dispense_id' => $dispense->id,
                'code_no' => $item->id,
                'drug_name' => $item->name,
                'cost_price' => $item->options['unitPrice'],
                'sale_price' => $item->price,
                'dosage_regimen' => $item->options['dosage'],
                'quantity_prescribed' => $item->qty,
                'subtotal_prescribed' => $item->options['total'],
                ]);

            $drug = Drug::where('code_no', $item->id)->first();
            $drug->store_balance =  ($drug->store_balance - $item->qty);
            $drug->save();

            }

        Cart::destory();

        return back()->with('success_message', 'Drug(s) dispensed successfully.');
    }

    public function prescriptions($id)
    {
        $dispense = Dispense::where('id', $id)->with('prescriptions')->firstOrFail();
        //dd($dispense, $id);
        return view('pharmacy.dispense.show', compact('dispense'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\Dispense  $dispense
     * @return \Illuminate\Http\Response
     */
    public function show(Dispense $dispense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\Dispense  $dispense
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispense $dispense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\Dispense  $dispense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispense $dispense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\Dispense  $dispense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispense $dispense)
    {

        $user = Auth::user();
        $dispense->canceled_by = $user->name;
        $dispense->returned_by = $user->name;
        $dispense->returned = 1;
        $dispense->dispensed = 0;
        $dispense->save();

        $getDispensedDrug = $dispense->prescriptions()->get();

        foreach ($getDispensedDrug as $item)
        {
            $drug = Drug::where('code_no', $item->code_no)->firstOrFail();
            $drug->store_balance = $drug->store_balance + $item->quantity_prescribed;
            $drug->save();
        }
        $dispense->delete();

        return back()->with('success_message', 'Prescription(s) successfully deleted and returned to shelf.');
    }

    public function returnDrug(Prescription $prescription)
    {
        $user = Auth::user();
        $prescription->canceled_by = $user->name;
        $prescription->save();

        $drug = Drug::where('code_no', $prescription->code_no)->firstOrFail();
        $drug->store_balance = $drug->store_balance + $prescription->quantity_prescribed;
        $drug->save();

        $prescription->delete();

        return back()->with('success_message', 'Drug successfully deleted and returned to shelf.');

    }

    private function validateRequest()
    {
        return request()->validate([
            'retainership' => 'required|string',
            'surname' => 'required|string',
            'otherName' => 'required|string',
            'gender' => 'required|string',
            'consultant' => 'required|string',
        ]);
    }

    private function generatePharmacyNumber()
    {
        $random = strtoupper(Str::random(5));
        return $value = "HBMC/PHM/".$random;
    }
}
