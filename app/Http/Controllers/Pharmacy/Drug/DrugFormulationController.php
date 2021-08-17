<?php

namespace App\Http\Controllers\Pharmacy\Drug;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy\DrugFormulation;
use Illuminate\Http\Request;

class DrugFormulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "formulation";
        $param = new DrugFormulation();
        $formulations = DrugFormulation::paginate(10);

        return view('pharmacy.drugformulation.create', compact('title', 'param', 'formulations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest();

        DrugFormulation::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success_message', 'Drug formulation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugFormulation  $drugFormulation
     * @return \Illuminate\Http\Response
     */
    public function show(DrugFormulation $drugFormulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugFormulation  $drugFormulation
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugFormulation $drugFormulation)
    {
        $title = "formulation";
        $param = $drugFormulation;
        return view('pharmacy.drugformulation.edit', compact('title', 'param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\DrugFormulation  $drugFormulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugFormulation $drugFormulation)
    {
        $this->validateRequest();
        $drugFormulation->name = $request->name;
        $drugFormulation->description = $request->description;
        $drugFormulation->save();
        return redirect()->route('pharmacy.drugFormulation.create')->with('success_message', 'Drug formulation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\DrugFormulation  $drugFormulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugFormulation $drugFormulation)
    {
        $drugFormulation->delete();
        return back()->with('success_message', 'Drug formulation deleted successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    }
}
