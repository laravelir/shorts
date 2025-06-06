<?php

namespace Laravelir\Shorts\Facades;

use Illuminate\Support\Facades\Facade;

class Shorts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shorts';
    }
}
