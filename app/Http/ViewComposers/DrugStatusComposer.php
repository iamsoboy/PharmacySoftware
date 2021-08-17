<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Pharmacy\Drug;

class DrugStatusComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $today = now()->format('Y-m-d');

        $outOfStock = Drug::where([
            ['store_balance', '<=', 3],
            ['status', 1]
        ])->get();

        $prevMonths = now()->subMonth(3)->format('Y-m-d');
        $soonExpiring = Drug::whereBetween('expiry_date', [$prevMonths, $today])->get();

        $future = now()->addMonth(1)->format('Y-m-d');
        $expired = Drug::whereBetween('expiry_date', [$today, $future])->get();


        $view->with('outOfStock', $outOfStock)
            ->with('soonExpiring', $soonExpiring)
            ->with('expired', $expired);
    }
}
