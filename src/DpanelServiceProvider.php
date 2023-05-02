<?php

namespace DD4You\Dpanel;

use App\Models\User;
use DD4You\Dpanel\Console\InstallDpanel;
use DD4You\Dpanel\Http\Middleware\AccessDpanel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Routing\Router;

class DpanelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallDpanel::class,
            ]);
        }

        $this->callAfterResolving(Gate::class, function (Gate $gate) {
            $gate->define('role', function (User $user) {
                return in_array($user->role->getRole(), config('dpanel.dpanel_access_roles'));
            });
        });

        $this->app->make(Router::class)->aliasMiddleware('accessdpanel', AccessDpanel::class);

        # Register Routes Begin
        if (File::exists(base_path('routes/dpanel.php'))) {
            Route::prefix(config('dpanel.prefix'))
                ->name(config('dpanel.prefix') . '.')
                ->middleware(['web', 'auth', 'accessdpanel'])
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

    public function register()
    {
        $this->callAfterResolving('blade.compiler', fn (BladeCompiler $bladeCompiler) => $this->registerBladeExtensions($bladeCompiler));
    }

    public static function bladeMethodWrapper($method, $role, $guard = null): bool
    {
        return auth($guard)->check() && auth($guard)->user()->{$method}($role);
    }

    protected function registerBladeExtensions($bladeCompiler): void
    {
        $bladeMethodWrapper = '\\DD4You\\Dpanel\\DpanelServiceProvider::bladeMethodWrapper';

        $bladeCompiler->directive('role', fn ($args) => "<?php if({$bladeMethodWrapper}('hasRole', {$args})): ?>");
        $bladeCompiler->directive('elserole', fn ($args) => "<?php elseif({$bladeMethodWrapper}('hasRole', {$args})): ?>");
        $bladeCompiler->directive('endrole', fn () => '<?php endif; ?>');

        $bladeCompiler->directive('hasrole', fn ($args) => "<?php if({$bladeMethodWrapper}('hasRole', {$args})): ?>");
        $bladeCompiler->directive('endhasrole', fn () => '<?php endif; ?>');
    }
}
