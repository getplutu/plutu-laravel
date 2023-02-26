<?php

namespace PlutuLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Plutu\Services\PlutuTlync as PlutuTlyncService;

class PlutuTlync extends Facade
{

    protected static function getFacadeAccessor()
    {
        return PlutuTlyncService::class;
    }
    
}