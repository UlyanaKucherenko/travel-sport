<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class AdminUnsubscribe
 * @package App\Facades
 */
class AdminUnsubscribe extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\AdminUnsubscribe::class;
    }

}

