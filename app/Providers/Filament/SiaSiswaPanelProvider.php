<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CheckUserRole;
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

class SiaSiswaPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->login()
            ->profile()
            ->id('siaSiswa')
            ->path('siaSiswa')
            ->sidebarFullyCollapsibleOnDesktop()
            ->profile()
            ->breadcrumbs(false)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/SiaSiswa/Resources'), for: 'App\\Filament\\SiaSiswa\\Resources')
            ->discoverPages(in: app_path('Filament/SiaSiswa/Pages'), for: 'App\\Filament\\SiaSiswa\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/SiaSiswa/Widgets'), for: 'App\\Filament\\SiaSiswa\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
                // CheckUserRole::class. ':siaSiswa'
            ])
            // ->authGate('siaSiswa')
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
