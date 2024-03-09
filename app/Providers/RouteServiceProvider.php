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
            //map web route
            $this->mapWebRoutes();
            //map dashboard route
            $this->mapDashboardRoutes();
            //map category route
            $this->mapCategoryRoutes();
            //map menu route
            $this->mapMenuRoutes();
            //map product route
            $this->mapProductRoutes();
            //map product image
            $this->mapProductImageRoutes();
            //map product tag
            $this->mapProductTagRoutes();
            //map tag route
            $this->mapTagRoutes();
            //map slider route
            $this->mapSliderRoutes();
            //map setting route
            $this->mapSettingRoutes();
            //map user route
            $this->mapUserRoutes();
            //map role route
            $this->mapRoleRoutes();
            //map permission route
            $this->mapPermissionRoutes();
            //map user role route
            $this->mapUserRoleRoutes();
            //map permission role route
            $this->mapPermissionRoleRoutes();
            //map color role route
            $this->mapColorRoutes();
            //map size role route
            $this->mapSizeRoutes();
            //map sample role route
            $this->mapSampleRoutes();
            //map cart role route
            $this->mapCartRoutes();
            //map api route
            $this->mapApiRoutes();
        });
    }

    public function mapWebRoutes() {
        //Web route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));     
    }

    public function mapDashboardRoutes() {
        //Dashboard route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard-route.php'));
    }

    public function mapCategoryRoutes() {
        //Category route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/category-route.php'));
    }

    public function mapMenuRoutes() {
         //Menu route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/menu-route.php'));
    }

    public function mapProductRoutes() {
         //Product route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/product-route.php'));
    }

    public function mapProductImageRoutes() {
         //Product image route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/product-image-route.php'));
    }

    public function mapProductTagRoutes() {
        //Product tag route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/product-tag-route.php'));
    }

    public function mapTagRoutes() {
        //Tag route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/tag-route.php'));
    }

    public function mapSliderRoutes() {
        //Slider route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/slider-route.php'));
    }

    public function mapSettingRoutes() {
        //Setting route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/setting-route.php'));
    }

    public function mapUserRoutes() {
        //User route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/user-route.php'));
    }

    public function mapRoleRoutes() {
        //Role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/role-route.php'));
    }

    public function mapPermissionRoutes() {
        //Permission route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/permission-route.php'));
    }

    public function mapUserRoleRoutes() {
        //User role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/user-role-route.php'));
    }

    public function mapPermissionRoleRoutes() {
        //Permisson role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/permission-role-route.php'));
    }

    public function mapColorRoutes() {
        //Color role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/color-route.php'));
    }

    public function mapSizeRoutes() {
        //Size role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/size-route.php'));
    }

    public function mapSampleRoutes() {
        //Sample role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sample-route.php'));
    }

    public function mapCartRoutes() {
        //Cart role route
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/cart-route.php'));
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
