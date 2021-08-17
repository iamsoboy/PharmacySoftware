<?php

namespace App\Http\Controllers\Pharmacy\Drug;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy\DrugCategory;
use Illuminate\Http\Request;

class DrugCategoryController extends Controller
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
        $title = "category";
        $param = new DrugCategory();
        $categories = DrugCategory::paginate(10);

        return view('pharmacy.drugcategory.create', compact('title', 'param', 'categories'));
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

        DrugCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success_message', 'Drug category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DrugCategory $drugCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugCategory $drugCategory)
    {
        $title = "category";
        $param = $drugCategory;
        return view('pharmacy.drugcategory.edit', compact('title', 'param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugCategory $drugCategory)
    {
        $this->validateRequest();
        $drugCategory->name = $request->name;
        $drugCategory->description = $request->description;
        $drugCategory->save();
        return redirect()->route('pharmacy.drugCategory.create')->with('success_message', 'Drug category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugCategory $drugCategory)
    {
        $drugCategory->delete();
        return back()->with('success_message', 'Drug category created successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
    }
}
