<?php

namespace App\Http\Controllers\Pharmacy\Drug;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy\DrugClass;
use Illuminate\Http\Request;

class DrugClassController extends Controller
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
        $title = "class";
        $param = new DrugClass();
        $classes = DrugClass::paginate(10);

        return view('pharmacy.drugclass.create', compact('title', 'param', 'classes'));
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

        DrugClass::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success_message', 'Drug class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugClass  $drugClass
     * @return \Illuminate\Http\Response
     */
    public function show(DrugClass $drugClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugClass  $drugClass
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugClass $drugClass)
    {
        $title = "class";
        $param = $drugClass;
        return view('pharmacy.drugClass.edit', compact('title', 'param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\DrugClass  $drugClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugClass $drugClass)
    {
        $this->validateRequest();
        $drugClass->name = $request->name;
        $drugClass->description = $request->description;
        $drugClass->save();
        return redirect()->route('pharmacy.drugClass.create')->with('success_message', 'Drug class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\DrugClass  $drugClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugClass $drugClass)
    {
        $drugClass->delete();
        return back()->with('success_message', 'Drug class created successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    }
}
