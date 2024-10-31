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

        // disable closing the popup modal by pressing Escape key
        //
        // Note: this feauture is avaiable since filament version 3.2.98.
        // filament can be upgraded in this way:
        // 1. remove composer.lock, remove vendor folder
        // 2. run command "composer install"
        Modal::closedByEscaping(false);
    }
}
