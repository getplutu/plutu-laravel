<?php

namespace PlutuLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Plutu\Services\PlutuMpgs as PlutuMpgsService;

class PlutuMpgs extends Facade
{

    protected static function getFacadeAccessor()
    {
        return PlutuMpgsService::class;
    }
    
}