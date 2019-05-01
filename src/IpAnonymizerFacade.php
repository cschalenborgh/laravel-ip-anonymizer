<?php

namespace Cschalenborgh\IpAnonymizer;

use Illuminate\Support\Facades\Facade;

/**
 * Class IpAnonymizerFacade.
 */
class IpAnonymizerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-ip-anonymizer';
    }
}
