<?php

namespace PlutuLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Plutu\Services\PlutuAdfali as PlutuAdfaliService;

class PlutuAdfali extends Facade
{

    protected static function getFacadeAccessor()
    {
        return PlutuAdfaliService::class;
    }
    
}