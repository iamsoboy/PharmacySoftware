<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy\Drug;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /*
    public function axa()
    {
        $mansard = Drug::where([
            ['axamansard_price', '!=', null],
            ['axamansard_price', '!=', 0],
            ['status', 1]
        ])->get();

        foreach ($mansard as $item)
        {
            $leadway = Drug::where('product_name', $item->product_name)->first();
            $leadway->leadway_price = $item->axamansard_price;
            $leadway->save();
        }

        dd("Done", $mansard, $leadway);
    }
    */
    public function destroy($id)
    {
        Auth::logout();
        dd($id);
        Cart::remove($id);


    }
}
