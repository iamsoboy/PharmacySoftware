<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $user = Auth::user();

        //dd($userprofile);
        $view->with('user', $user);
    }
}
