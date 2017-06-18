<?php
namespace Mukuru\ExchangeRateApi;

interface ExchangeRateClientContract
{
    /**
     * @param array $currencies
     * @return mixed
     */
    public function getExchangeRatesForCurrencies(array $currencies);
}
