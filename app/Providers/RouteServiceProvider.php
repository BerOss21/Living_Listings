<?php

namespace App\Providers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\Scopes\ListingWasNotSoldScope;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });


        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web','auth')
                ->prefix('realtor')
                ->as('realtor.')
                ->group(base_path('routes/realtor.php'));

            Route::middleware('web','auth')
                ->as('listings.offers.')
                ->group(base_path('routes/offer.php'));

            Route::middleware('web','auth')
                ->as('notifications.')
                ->group(base_path('routes/notification.php'));
        });
    }
}
