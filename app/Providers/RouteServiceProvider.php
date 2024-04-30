<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/config/role';

    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->defineRoutes();
    }

    private function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    private function defineRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        $this->defineAdminRoutes('config');
        $this->defineAdminRoutes('dispatcher');
        $this->defineAdminRoutes('manager');
        $this->defineAdminRoutes('occurrence');
        $this->defineAdminRoutes('supervision');
        $this->defineAdminRoutes('technique');
        $this->defineAdminRoutes('certificates');

    }

    private function defineAdminRoutes(string $prefix): void
    {
        $middleware = ['web', 'auth:sanctum', config('jetstream.auth_session'), 'verified', 'verify.battalion'];

        Route::middleware($middleware)->prefix($prefix)->group(base_path("routes/admin/{$prefix}.php"));
    }
}
