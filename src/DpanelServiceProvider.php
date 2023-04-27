<?php

namespace DD4You\Dpanel;

use DD4You\Dpanel\Console\InstallDpanel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
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

        # Register Routes Begin
        if (File::exists(base_path('routes/dpanel.php'))) {
            Route::prefix(config('dpanel.prefix'))
                ->name(config('dpanel.prefix') . '.')
                ->middleware(['web', 'auth'])
                ->group(function () {
                    $this->loadRoutesFrom(base_path('routes/dpanel.php'));
                });
        }


        Route::prefix(config('dpanel.prefix'))
            ->name(config('dpanel.prefix') . '.')
            ->middleware(['web', 'guest'])
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
            });
        # Register Routes End


        $this->loadViewsFrom(__DIR__ . '/resources/views', 'dpanel');
        Blade::componentNamespace('DD4You\\Views\\Components', 'dpanel');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/assets/' => public_path('dd4you/dpanel/'),
            ], 'dpanel-asset');

            $this->publishes([
                __DIR__ . '/database/migrations/update_to_users_table.php.stub' => database_path('migrations/2014_10_12_200000_update_to_users_table.php'),
            ], 'migrations');


            $this->publishes([
                __DIR__ . '/Models/User.php.stub' => app_path('Models/User.php'),
            ], 'models');
            $this->publishes([
                __DIR__ . '/Enums/UserRole.php.stub' => app_path('Enums/UserRole.php'),
            ], 'enums');
        }
    }
}
