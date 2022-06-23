<?php

namespace RyanChandler\LaravelComments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RyanChandler\LaravelComments\LaravelComments
 */
class LaravelComments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-comments';
    }
}
