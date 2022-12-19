<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';
    public const TRANSLATOR = '/translator/counselling/schedule';
    public const ADMIN = '/admin/list/user';
    public const COUNSELLOR = '/psychologist/counselling/schedule';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api/v1')
                ->middleware('api')
                ->as('api.v1.')
                ->namespace($this->namespace)
                ->group(base_path('routes/Api/V1/api.php'));

            Route::middleware('web')
                ->prefix('admin')
                ->as('admin.')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->prefix('translator')
                ->as('translator.')
                ->namespace($this->namespace)
                ->group(base_path('routes/translator.php'));

            Route::middleware('web')
                ->prefix('psychologist')
                ->as('psychologist.')
                ->namespace($this->namespace)
                ->group(base_path('routes/counsellor.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
