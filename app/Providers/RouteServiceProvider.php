<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/checkRoll';


     protected $namespace = 'App\\Http\\Controllers';
     protected $superAdminNamespace = 'App\\Http\\Controllers\\SuperAdmin';
     protected $adminNamespace = 'App\\Http\\Controllers\\Admin';
     protected $tourAdminNamespace = 'App\\Http\\Controllers\\TourAdmin';
     protected $customerNamespace = 'App\\Http\\Controllers\\Customer';
     protected $checkRoleNamespace = 'App\\Http\\Controllers\\CheckRole';


    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->customerNamespace)
                ->group(base_path('routes/customer/web.php'));

            Route::middleware('web')
                ->namespace($this->tourAdminNamespace)
                ->group(base_path('routes/tourAdmin/web.php'));

            Route::middleware('web')
                ->namespace($this->adminNamespace)
                ->group(base_path('routes/admin/web.php'));

            Route::middleware('web')
                ->namespace($this->checkRoleNamespace)
                ->group(base_path('routes/checkRole/web.php'));

            Route::middleware('web')
                ->namespace($this->superAdminNamespace)
                ->group(base_path('routes/superAdmin/web.php'));

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
            return Limit::perMinute(60);
        });
    }
}
