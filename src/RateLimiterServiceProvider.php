<?php

namespace Cschalenborgh\RateLimiter;

use Illuminate\Support\ServiceProvider;

/**
 * Class RateLimiterServiceProvider.
 */
class RateLimiterServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->alias(RateLimiter::class, 'laravel-rate-limiter');
    }
}
