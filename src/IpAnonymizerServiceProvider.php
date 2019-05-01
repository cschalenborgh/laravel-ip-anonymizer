<?php

namespace Cschalenborgh\IpAnonymizer;

use Illuminate\Support\ServiceProvider;

/**
 * Class IpAnonymizerServiceProvider
 *
 * @package Cschalenborgh\IpAnonymizer
 */
class IpAnonymizerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->alias(IpAnonymizer::class, 'laravel-ip-anonymizer');
    }
}
