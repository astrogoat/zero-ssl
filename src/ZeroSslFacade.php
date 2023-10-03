<?php

namespace Astrogoat\ZeroSsl;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\ZeroSsl\ZeroSsl
 */
class ZeroSslFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zero-ssl';
    }
}
