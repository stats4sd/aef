<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Models\Team;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Navigation\NavigationItem;
use App\Filament\App\Pages\RegisterTeam;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use Illuminate\Session\Middleware\StartSession;
use Tio\Laravel\Middleware\SetLocaleMiddleware;
use App\Http\Middleware\SetLatestTeamMiddleware;
use Illuminate\Cookie\Middleware\EncryptCookies;
use App\Filament\App\Resources\StudyCaseResource;
use App\Filament\App\Resources\OrganisationResource;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use BetterFuturesStudio\FilamentLocalLogins\LocalLogins;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AppPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('app')
            ->path('app')
            ->homeUrl('/home')
            ->tenant(Team::class)
            // disable "Register New Team" option in multi-tenancy
            // new team should be created by admin, user should not be able to create a new team
            // ->tenantRegistration(RegisterTeam::class)
            ->tenantMiddleware([
                SetLatestTeamMiddleware::class,
            ])
            ->login()
            ->passwordReset()
            // change sidebar to top navigation, to discriminate from Admin panel
            ->topNavigation()
            ->profile() // TODO: Implement more full-featured profile page
            ->darkMode(false)
            ->colors([
                'primary' => Color::Amber,
                'grey' => Color::Gray,
            ])
            ->discoverResources(in: app_path('Filament/App/Resources'), for: 'App\\Filament\\App\\Resources')
            ->discoverPages(in: app_path('Filament/App/Pages'), for: 'App\\Filament\\App\\Pages')
            ->pages([
                // To show dashbaord in sidebar, we need to comment custom navigation() in bottom part
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/App/Widgets'), for: 'App\\Filament\\App\\Widgets')
            ->widgets([
                // It is useful to check filament version in filament info widget in dashboard
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->plugins([
                new LocalLogins(),
                ])
            ->renderHook(
                PanelsRenderHook::TOPBAR_END,
                fn() => view('languageSelector'),
            )
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
                SetLocaleMiddleware::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])

            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->items([
                    ...StudyCaseResource::getNavigationItems(),
                ])
                    ->groups([
                        // remove "Partner Organisations" from sidebar
                        // NavigationGroup::make('Definitions')
                        //     ->label(t('Definitions'))
                        //     ->items([
                        //         ...OrganisationResource::getNavigationItems(),
                        //     ]),
                        // create a navigation group without label, nothing will be showed for non admin user
                        NavigationGroup::make('')
                            ->items([
                                // Admin panel item cannot be the first item, otherwise user will be redirected to admin panel when visiting app panel
                                NavigationItem::make('Admin Panel')
                                    ->label(t('Admin Panel'))
                                    ->url('/admin')
                                    ->icon('heroicon-o-adjustments-horizontal')
                                    ->visible(fn() => auth()->user()?->can('access admin panel')),
                            ]),
                    ]);
            })
        ;
    }
}
