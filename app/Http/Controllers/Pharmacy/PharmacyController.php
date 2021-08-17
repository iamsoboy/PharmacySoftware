<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy\Drug;
use App\Models\Pharmacy\Prescription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $prev = now()->subDay(6)->format('Y-m-d');
        $timestamp = time();
        for ($i = 0 ; $i < 7 ; $i++) {
            $labels[] = date('j M', $timestamp);
            $todayDate = date('Y-m-d', $timestamp);
            $sellOrders = Prescription::whereDate('created_at', $todayDate)->get();
            $totalSell[] = $sellOrders->sum('subtotal_prescribed');
            $totalBuy[] = $sellOrders->sum('cost_price');
            $timestamp -= 24 * 3600;
        }

        $amountOfBuy = Prescription::whereBetween('created_at', [$prev, $today])->sum('cost_price');
        $amountOfSell = Prescription::whereBetween('created_at', [$prev, $today])->sum('subtotal_prescribed');

        $prescriptions = Prescription::take(2)->get();

        $outOfStock = Drug::where([
            ['store_balance', '<=', 3],
            ['status', 1]
        ])->get();

        $prevMonths = now()->subMonth(3)->format('Y-m-d');
        $soonExpiring = Drug::whereBetween('expiry_date', [$prevMonths, $today])->get();

        $future = now()->addMonth(1)->format('Y-m-d');
        $expired = Drug::whereBetween('expiry_date', [$today, $future])->get();

        //dd($amountOfBuy, $amountOfSell, $today, $prev);
        return view('pharmacy.index',
            compact(
                'labels', 'totalSell', 'totalBuy', 'amountOfBuy', 'amountOfSell',
                'prescriptions', 'outOfStock', 'soonExpiring', 'expired'
            ));
    }

    public function outOfStock()
    {
        return view('pharmacy.drugstatus.out_of_stock');
    }

    public function soonExpiring()
    {
        return view('pharmacy.drugstatus.soon_expiring');
    }

    public function expired()
    {
        return view('pharmacy.drugstatus.expired');
    }
}
