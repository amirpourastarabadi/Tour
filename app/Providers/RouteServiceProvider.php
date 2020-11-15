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
    protected $interfaceZone = 'App\\Http\\Controllers\\InterfaceZone';
    protected $superAdminNamespace = 'App\\Http\\Controllers\\SuperAdmin';
    protected $adminNamespace = 'App\\Http\\Controllers\\Admin';
    protected $tourAdminNamespace = 'App\\Http\\Controllers\\TourAdmin';
    protected $passengerNamespace = 'App\\Http\\Controllers\\Passenger';
    protected $checkRoleNamespace = 'App\\Http\\Controllers\\CheckRole';
    protected $registerNamespace = 'App\\Http\\Controllers\\Register';


    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware(['web'])
                ->namespace($this->interfaceZone)
                ->group(base_path('routes/interfaceZone/web.php'));

            Route::middleware(['web', 'auth', 'role'])
                ->prefix('passenger')
                ->namespace($this->passengerNamespace)
                ->name('passenger.')
                ->group(base_path('routes/passenger/web.php'));

            Route::middleware(['web', 'auth', 'role'])
                ->namespace($this->tourAdminNamespace)
                ->prefix('tourAdmin')
                ->name('tourAdmin.')
                ->group(base_path('routes/tourAdmin/web.php'));
//            Route::middleware(['web', 'auth', 'role'])
//                ->name('admin.')
//                ->prefix('admin/')
//                ->namespace($this->adminNamespace)
//                ->group(base_path('routes/admin/passengers.php'));

            Route::middleware(['web', 'auth', 'role'])
                ->namespace($this->adminNamespace)
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin/web.php'));

            Route::middleware('web')
                ->namespace($this->checkRoleNamespace)
                ->group(base_path('routes/checkRole/web.php'));

            Route::middleware(['web', 'auth', 'role'])
                ->prefix('superAdmin')
                ->namespace($this->superAdminNamespace)
                ->name('superAdmin.')
                ->group(base_path('routes/superAdmin/web.php'));

            Route::middleware('web')
                ->namespace($this->registerNamespace)
                ->prefix('register')
                ->name('register.')
                ->group(base_path('routes/register/web.php'));

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
