<?php
namespace Mukuru\ExchangeRateApi;

use Illuminate\Support\Facades\Facade;

class ExchangeRate extends Facade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'exchangerate';
    }
}
