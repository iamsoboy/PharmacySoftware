<?php

namespace App\Http\Controllers\Pharmacy\Drug;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy\DrugDetail;

class DrugDetailController extends Controller
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
        $title = "section";
        $param = new DrugDetail();
        $sections = DrugDetail::paginate(10);
        return view('pharmacy.drugsection.create', compact('title', 'param', 'sections'));
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

        DrugDetail::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success_message', 'Drug section created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugDetail  $drugDetail
     * @return \Illuminate\Http\Response
     */
    public function show(DrugDetail  $drugDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugDetail  $drugDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugDetail  $drugDetail)
    {
        $title = "section";
        $param = $drugDetail;

        return view('pharmacy.drugsection.edit', compact('title', 'param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\DrugDetail  $drugDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugDetail  $drugDetail)
    {
        $this->validateRequest();
        $drugDetail->name = $request->name;
        $drugDetail->description = $request->description;
        $drugDetail->save();
        return redirect()->route('pharmacy.drugDetail.create')->with('success_message', 'Drug section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\DrugDetail  $drugDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugDetail  $drugDetail)
    {
        $drugDetail->delete();
        return back()->with('success_message', 'Drug section created successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    }
}
