<?php

namespace Cschalenborgh\RateLimiter;

use Illuminate\Support\Facades\Facade;

/**
 * Class RateLimiterFacade.
 */
class RateLimiterFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-rate-limiter';
    }
}
