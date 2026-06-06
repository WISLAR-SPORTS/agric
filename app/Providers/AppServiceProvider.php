<?php

namespace App\Providers;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

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
        Filament::serving(function () {
            Filament::registerRenderHook(
                'panels::auth.logout.after',
                fn () => redirect('/')
            );
        });
        View::share('settings', Setting::first());
        //
    }
    
}
