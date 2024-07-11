<?php

namespace App\Providers\Filament;

// use App\Filament\SiaSiswa\Pages\LoginSiswa as PagesLoginSiswa;
use App\Http\Middleware\CheckUserRole;
// use App\Livewire\Auth\LoginSiswa;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Pages\Auth\LoginSiswa as AuthLoginSiswa;
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
use Rupadana\ApiService\ApiService;
use Rupadana\ApiService\ApiServicePlugin;

class SiaSiswaPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->login(AuthLoginSiswa::class)
            ->profile()
            ->id('siaSiswa')
            ->path('siaSiswa')
            ->sidebarFullyCollapsibleOnDesktop()
            ->breadcrumbs(false)
            ->passwordReset()
            ->emailVerification()
            ->colors([
                'primary' => '#61876e',
                'gray' => 'rgb(107, 114, 128)',
            ])
            ->brandLogo(asset('svg/logo.svg'))
            ->darkModeBrandLogo(asset('svg/logo-dark.svg'))
            ->brandLogoHeight('2.8rem')
            ->favicon(asset('img/logo.png'))
            ->discoverResources(in: app_path('Filament/SiaSiswa/Resources'), for: 'App\\Filament\\SiaSiswa\\Resources')
            ->discoverPages(in: app_path('Filament/SiaSiswa/Pages'), for: 'App\\Filament\\SiaSiswa\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/SiaSiswa/Widgets'), for: 'App\\Filament\\SiaSiswa\\Widgets')
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                ApiServicePlugin::make()
            ]);
    }
}
