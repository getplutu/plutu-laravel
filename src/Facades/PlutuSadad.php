<?php

namespace PlutuLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Plutu\Services\PlutuSadad as PlutuSadadService;

class PlutuSadad extends Facade
{

    protected static function getFacadeAccessor()
    {
        return PlutuSadadService::class;
    }
    
}