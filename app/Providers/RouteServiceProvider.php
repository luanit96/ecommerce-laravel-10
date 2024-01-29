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
    public const HOME = '/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    //protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->routes(function() {
            $this->mapWebRoutes();
            $this->mapApiRoutes();
        });
    }

    public function mapWebRoutes() {
        Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
            //Route category
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/category-route.php'));
            //Route menu
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/menu-route.php'));
            //Route product
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/product-route.php'));
            //Route tag
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/tag-route.php'));
            //Route slider
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/slider-route.php'));
            //Route setting
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/setting-route.php'));
            //Route user
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/user-route.php'));
            //Route role
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/role-route.php'));
            //Route permission
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/permission-route.php'));
    }

    public function mapApiRoutes() {
        Route::prefix('api')
            ->middleware('api')
            ->namespace('App\Http\Controllers\Api\Admin')
            ->group(base_path('routes/api.php'));
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
