<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\View\Components\Modal;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // disable closing the popup modal by clicking away
        Modal::closedByClickingAway(false);

        // hide the popup modal "Close" button at upper right corner
        Modal::closeButton(false);

        // TODO: disable closing the popup modal by pressing Escape key
        // Note: this function does not exist in filament v3.2 Modal class
        // Modal::closedByEscaping(false);
    }
}
