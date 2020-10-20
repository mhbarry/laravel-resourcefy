<?php

namespace Mhbarry\LaravelResourcefy\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelResourcefy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravelresourcefy';
    }
}
