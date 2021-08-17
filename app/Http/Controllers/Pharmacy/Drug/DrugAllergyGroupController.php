<?php

namespace App\Http\Controllers\Pharmacy\Drug;

use App\Models\Pharmacy\DrugAllergyGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrugAllergyGroupController extends Controller
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
        $title = "allergy group";
        $param = new DrugAllergyGroup();
        $allergies = DrugAllergyGroup::paginate(10);

        return view('pharmacy.drugallergy.create', compact('title', 'param', 'allergies'));
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

        DrugAllergyGroup::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success_message', 'Drug allergy group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugAllergyGroup  $drugAllergyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(DrugAllergyGroup $drugAllergyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugAllergyGroup  $drugAllergyGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "allergy group";
        $param = DrugAllergyGroup::where('id', $id)->firstOrFail();
        return view('pharmacy.drugallergy.edit', compact('title', 'param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\DrugAllergyGroup  $drugAllergyGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $drugAllergyGroup = DrugAllergyGroup::where('id', $id)->firstOrFail();
        $this->validateRequest();
        $drugAllergyGroup->name = $request->name;
        $drugAllergyGroup->description = $request->description;
        $drugAllergyGroup->save();
        return redirect()->route('pharmacy.drugAllergy.create')->with('success_message', 'Drug allergy group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\DrugAllergyGroup  $drugAllergyGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drugAllergyGroup = DrugAllergyGroup::where('id', $id)->firstOrFail();
        $drugAllergyGroup->delete();
        return back()->with('success_message', 'Drug allergy group created successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    }
}
