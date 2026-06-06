<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\View\PanelsRenderHook;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\Login::class) // Enables Filament login page
             // ✅ ADD THIS SECTION
        ->brandName('UNUSU AGRIC WEBSYSTEM')
        //->brandLogo(url('images/logo.png'))
        //->favicon(asset('images/logo.png'))
        ->authGuard('web')
        ->passwordReset()

        ->colors([
            //'primary' => Color::Amber,
            'primary' => Color::Green,
            'secondary' => Color::Blue,
        
           

            ])
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                fn (): string => '<div class="mt-6 space-y-4 text-center px-4">
            
                    <a href="' . route('landing') . '" 
                       class="inline-flex items-center justify-center gap-2
                              px-5 py-2.5 text-sm font-medium
                              text-gray-700 bg-white border border-gray-200 rounded-full
                              shadow-sm hover:shadow-md hover:border-gray-300
                              transition-all">
                        ← Back to Home
                    </a>
            
                    <div class="space-y-2">
            
                        <a href="' .  url('/admin/password-reset/request')  . '" 
                           class="block text-sm font-medium text-green-600 hover:text-green-700 hover:underline">
                            Forgot password?
                        </a>
            
                    </div>
            
                </div>',
            )
           //->viteTheme('resources/css/filament/admin/theme.css')
         


            ->discoverResources(
                in: app_path('Filament/Admin/Resources'),
                for: 'App\\Filament\\Admin\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Admin/Pages'),
                for: 'App\\Filament\\Admin\\Pages'
            )
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Admin/Widgets'),
                for: 'App\\Filament\\Admin\\Widgets'
            )
           // ->widgets([
               // Widgets\AccountWidget::class,
               // Widgets\FilamentInfoWidget::class,
            //])
            ->widgets([
                \App\Filament\Admin\Widgets\FarmerGenderChart::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}