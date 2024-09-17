<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use App\Http\Middleware\CheckIfAdmin;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Admin\Resources\TagResource;
use App\Filament\Admin\Resources\TeamResource;
use App\Filament\Admin\Resources\UserResource;
use Illuminate\Session\Middleware\StartSession;
use Tio\Laravel\Middleware\SetLocaleMiddleware;
use Illuminate\Cookie\Middleware\EncryptCookies;
use App\Filament\Admin\Resources\CountryResource;
use App\Filament\Admin\Resources\LanguageResource;
use App\Filament\Admin\Resources\StudyCaseResource;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            // ->default()
            ->id('admin')
            ->path('admin')
            // ->login()
            ->darkMode(false)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\\Filament\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\\Filament\\Admin\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')
            ->widgets([])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
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
                CheckIfAdmin::class,
            ])
            // ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            //     return $builder->items([
            //         NavigationItem::make('Return to Front-end')
            //             ->url(url('/app'))
            //             ->icon('heroicon-o-arrow-left'),
            //         ...StudyCaseResource::getNavigationItems(),
            //     ])
            //         ->groups([
            //             NavigationGroup::make('Teams and Users')
            //                 ->items([
            //                     ...TeamResource::getNavigationItems(),
            //                     ...UserResource::getNavigationItems(),
            //                 ]),
            //             NavigationGroup::make('Roles and Permissions')
            //                 ->items([
            //                     ...RoleResource::getNavigationItems(),
            //                     ...PermissionResource::getNavigationItems(),
            //                 ]),
            //             NavigationGroup::make('Definitions')
            //                 ->items([
            //                     ...TagResource::getNavigationItems(),
            //                     ...LanguageResource::getNavigationItems(),
            //                     ...CountryResource::getNavigationItems(),
            //                 ]),
            //         ]);
            // })
        ;
    }
}
