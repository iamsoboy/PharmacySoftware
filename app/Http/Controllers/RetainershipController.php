<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy\Drug;
use App\Models\Retainership;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class RetainershipController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $retainerships = Retainership::all();
        $param = new Retainership();
        return view('retainership.create', compact('retainerships', 'param'));
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

        $name_price = str_replace(' ', '_', strtolower($request->name))."_price";

        try {
            $retainership = Retainership::create([
                'name_price' => $name_price,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'created_by' => $user->name,
            ]);


            Schema::table('drugs', function (Blueprint $table) use($name_price) {
                $table->float($name_price, 8, 2)->default(0.00)->after('nhis_price');
            });

        }catch (QueryException $e){

            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->back()->with('success_message', 'Retainership has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retainership  $retainership
     * @return \Illuminate\Http\Response
     */
    public function drugRetainership(Retainership $retainership)
    {
        return view('retainership.drugRetainership');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retainership  $retainership
     * @return \Illuminate\Http\Response
     */
    public function edit(Retainership $retainership)
    {
        $retainerships = Retainership::all();
        $param = $retainership;
        return view('retainership.edit', compact('retainerships', 'param'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retainership  $retainership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retainership $retainership)
    {
        $this->validateRequest();

        $retainership->name = $request->name;
        $retainership->description = $request->description;
        $retainership->status = $request->status;
        $retainership->save();

        return redirect('retainership-create')->with('success_message', 'Retainership has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retainership  $retainership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retainership $retainership)
    {
        $retainership->status = 0;
        $retainership->save();

        /* $name_price = $retainership->name_price;
         try {
             Schema::table('drugs', function (Blueprint $table) use($name_price){
                 $table->dropColumn($name_price);
             });
            $retainership->delete();
        }catch (QueryException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        */
        return redirect()->back()->with('success_message', 'Retainership has been deactivated successfully.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'status' => 'required|boolean'
        ]);
    }
}
