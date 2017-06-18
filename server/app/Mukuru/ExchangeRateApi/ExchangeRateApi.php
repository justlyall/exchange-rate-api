<?php
namespace Mukuru\ExchangeRateApi;

use GuzzleHttp\Client;

class ExchangeRateApi
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param ExchangeRateClientContract $client
     */
    public function __construct(ExchangeRateClientContract $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $currencies
     * @return array
     */
    public function getExchangeRatesForCurrencies(array $currencies)
    {
        return $this->client->getExchangeRatesForCurrencies($currencies);
    }
}
