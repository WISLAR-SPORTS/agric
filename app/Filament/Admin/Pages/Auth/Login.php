<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    protected function getViewData(): array
    {
        return [
            'showLandingLink' => true,
        ];
    }
}