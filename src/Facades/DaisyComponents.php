<?php

namespace MisterSimon\DaisyComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MisterSimon\DaisyComponents\DaisyComponents
 */
class DaisyComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MisterSimon\DaisyComponents\DaisyComponents::class;
    }
}
