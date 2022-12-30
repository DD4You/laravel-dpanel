<?php

namespace DD4You\Dpanel;

use DD4You\Dpanel\Console\InstallDpanel;
use DD4You\Dpanel\Models\Dpanel;
use DD4You\Dpanel\Http\Middleware\DdAuth;
use DD4You\Dpanel\Http\Middleware\DdGuest;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class DpanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallDpanel::class,
            ]);
        }
        // Middleware
        $router = $this->app->make(Router::class);

        // Register a group of middleware.
        $router->middlewareGroup(config('dpanel.prefix'), [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        $router->aliasMiddleware('dd.auth', DdAuth::class);
        $router->aliasMiddleware('dd.guest', DdGuest::class);
        // Middleware ============================================

        Config::set('auth.guards.dpanel', [
            'driver' => 'session',
            'provider' => 'dpanels',
        ]);

        Config::set('auth.providers.dpanels', [
            'driver' => 'eloquent',
            'model' => Dpanel::class,
        ]);

        $this->registerRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'dpanel');
        Blade::componentNamespace('DD4You\\Views\\Components', 'dpanel');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/assets/' => public_path('dd4you/dpanel/'),
            ], 'dpanel-asset');
        }
    }
    public function register()
    {
    }

    protected function registerRoutes()
    {
        if (File::exists(base_path('routes/dpanel.php'))) {
            Route::prefix(config('dpanel.prefix'))
                ->name(config('dpanel.prefix') . '.')
                ->middleware(['dd.auth:dpanel', config('dpanel.prefix')])
                ->group(function () {
                    $this->loadRoutesFrom(base_path('routes/dpanel.php'));
                });
        }


        Route::prefix(config('dpanel.prefix'))
            ->name(config('dpanel.prefix') . '.')
            ->middleware(['dd.guest:dpanel', config('dpanel.prefix')])
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
            });
    }
}
