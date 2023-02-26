<?php

namespace PlutuLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use Plutu\Services\PlutuLocalBankCards as PlutuLocalBankCardsService;

class PlutuLocalBankCards extends Facade
{

    protected static function getFacadeAccessor()
    {
        return PlutuLocalBankCardsService::class;
    }
    
}