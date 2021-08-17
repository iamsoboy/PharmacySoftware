<?php

namespace App\Providers;

use App\Http\ViewComposers\DrugStatusComposer;
use App\Http\ViewComposers\UserComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts/*'],UserComposer::class);

        view()->composer(['pharmacy/drugstatus/*', 'layouts/pharmacy/sidebar' ],DrugStatusComposer::class);
    }
}
