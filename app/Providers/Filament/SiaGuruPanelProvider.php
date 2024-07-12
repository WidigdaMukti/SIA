<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CheckUserRole;
use App\Models\User;
use Filament\Http\Middleware\Authenticate;
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
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class SiaGuruPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('siaGuru')
            ->login()
            ->path('siaGuru')
            ->sidebarFullyCollapsibleOnDesktop()
            ->profile()
            ->passwordReset()
            ->emailVerification()
            ->breadcrumbs(false)
            ->colors([
                'primary' => '#61876e',
                'gray' => 'rgb(107, 114, 128)',
            ])
            ->brandLogo(asset('svg/logo-light.svg'))
            ->darkModeBrandLogo(asset('svg/logo-dark.svg'))
            ->brandLogoHeight('2.8rem')
            ->favicon(asset('img/logo.png'))
            ->discoverResources(in: app_path('Filament/SiaGuru/Resources'), for: 'App\\Filament\\SiaGuru\\Resources')
            ->discoverPages(in: app_path('Filament/SiaGuru/Pages'), for: 'App\\Filament\\SiaGuru\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/SiaGuru/Widgets'), for: 'App\\Filament\\SiaGuru\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
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
                // CheckUserRole::class. ':siaGuru'
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
        // ->authGate('siaGuru')
        // ->plugins([
        //     FilamentEditProfilePlugin::make()
        // ]);
    }
}
