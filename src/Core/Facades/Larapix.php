<?php

namespace DanielHe4rt\Larapix\Core\Facades;

use Illuminate\Support\Facades\Facade;

class Larapix extends Facade
{
    /**
     * Get registered facade block
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'larapix';
    }
}
