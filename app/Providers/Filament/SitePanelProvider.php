<?php

namespace App\Providers\Filament;

use App\Filament\Site\Pages\HomePage;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class SitePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('site')
            ->path('/')
            ->login()
            ->registration()
            ->emailVerification(isRequired: false)
            ->passwordReset()
            ->profile()
            ->topNavigation()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Site/Resources'), for: 'App\Filament\Site\Resources')
            ->discoverPages(in: app_path('Filament/Site/Pages'), for: 'App\Filament\Site\Pages')
            ->pages([
                HomePage::class
            ])
            ->discoverWidgets(in: app_path('Filament/Site/Widgets'), for: 'App\Filament\Site\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->renderHook(PanelsRenderHook::GLOBAL_SEARCH_AFTER, fn (): string => view('filament.site.partials.global-search-after')->render())
            ->renderHook(PanelsRenderHook::HEAD_END, fn (): string => view('filament.site.partials.head-end')->render())
            ->renderHook(PanelsRenderHook::BODY_END, fn (): string => view('filament.site.partials.body-end')->render())
            // you can add more render hooks here ex. PanelsRenderHook::FOOTER, PanelsRenderHook::SCRIPTS_BEFORE or PanelsRenderHook::SCRIPTS_AFTERU
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
            ->viteTheme('resources/css/filament/site/theme.css')
            ->navigationItems([
                NavigationItem::make('login')
                    ->label(fn (): string => __('Login'))
                    ->url(fn (): string => route('filament.site.auth.login'))
                    ->icon(Heroicon::OutlinedArrowLeftEndOnRectangle)
                    ->hidden(fn (): bool => auth()->check()),
                NavigationItem::make('register')
                    ->label(fn (): string => __('Join Us'))
                    ->url(fn (): string => route('filament.site.auth.register'))
                    ->icon(Heroicon::OutlinedUserPlus)
                    ->hidden(fn (): bool => auth()->check()),
                NavigationItem::make('dashboard')
                    ->label(fn (): string => __('Dashboard'))
                    ->url(fn (): string => route('filament.app.pages.dashboard'))
                    ->icon(Heroicon::OutlinedChartBarSquare)
                    ->hidden(fn (): bool => ! auth()->check()),
            ]);
    }
}
