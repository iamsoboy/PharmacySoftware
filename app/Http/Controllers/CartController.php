<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function destroy($id)
    {
        Auth::logout();
        dd($id);
        Cart::remove($id);


    }
}
