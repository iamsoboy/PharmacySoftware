<?php

namespace App\Http\Controllers\Pharmacy;

use App\Models\Pharmacy\Drug;
use App\Models\Pharmacy\DrugStock;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DrugStockController extends Controller
{
    use softDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = DrugStock::all();
        return view('pharmacy.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "stock";
        $all_drugs = Drug::all();
        $inputs = [0,1,2,3,4,5,6,7,8,9];
        return view('pharmacy.stock.create', compact('title', 'all_drugs', 'inputs'));
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

        //dd($request->all());
        $ref = $this->genRef();

            foreach ($request['name'] as $key => $value) {
                $drugName = Drug::where('code_no', $value)->firstOrFail();
                $stock = DrugStock::create([
                    'stock_reference' => $ref,
                    'code_no' => $drugName->code_no,
                    'name' => $drugName->product_name,
                    'cost_price' => $request['cost_price'][$key],
                    'quantity' => $request['quantity'][$key],
                    'sale_price' => $request['sale_price'][$key],
                    'expiry_date' => $request['expiry_date'][$key],
                    'submitted_by' => $user->name, //"Staff Name"
                ]);
                $drugName->store_balance = $drugName->store_balance + $request['quantity'][$key];
                $drugName->expiry_date = $request['expiry_date'][$key];
                $drugName->cost_price = $request['cost_price'][$key];
                $drugName->retail_price = $request['sale_price'][$key];
                $drugName->private_price = $request['sale_price'][$key];
                $drugName->arrival_date = now();
                $drugName->save();
            }


        return back()->with('success_message', 'Drug Stock saved and drug(s) updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugStock  $drugStock
     * @return \Illuminate\Http\Response
     */
    public function show(DrugStock $drugStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugStock  $drugStock
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugStock $drugStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\DrugStock  $drugStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugStock $drugStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\DrugStock  $drugStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugStock $drugStock)
    {
        $user = Auth::user();

        $drugStock->deleted_by = $user->name;
        $drugStock->save();
        //dd($drugStock);
        $drugName = Drug::where('code_no', $drugStock->code_no)->firstOrFail();
        $drugName->store_balance = $drugName->store_balance - $drugStock->quantity;
        $drugName->expiry_date = now();
        $drugName->cost_price = 0;
        $drugName->retail_price = 0;
        $drugName->private_price = 0;
        $drugName->arrival_date = null;
        $drugName->save();

        $drugStock->delete();

        return back()->with('success_message', 'Drug Stock deleted successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|array|min:1',
            'name.0' => 'required|string',
            'sale_price.0' => 'required|numeric',
            'quantity.0' => 'required|numeric',
            'expiry_date.0' => 'required|string',
            'cost_price.0' => 'required|numeric',
        ],
            [
                'name.required' => 'Drug name field is required',
                'name.*.required' => 'Drug name field is required',
                'sale_price.*.required' => 'Sale price is required',
                'quantity.*.required' => 'Drug quantity field is required',
                'cost_price.*.required' => 'Cost price is required',
                'expiry_date.*.required' => 'Drug expiry date is required',
            ]
        );
    }

    private function genRef()
    {
        $random = strtoupper(Str::random(6));
        return $value = "HBMC/INV/".$random;
    }
}
