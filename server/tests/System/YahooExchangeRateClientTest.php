<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use Mukuru\ExchangeRateApi\YahooExchangeRateRateClient;
use Tests\TestCase;

class YahooExchangeRateClientTest extends TestCase
{
    public function testGetExchangeRatesForCurrencies_withCurrencies_ShouldReturnCurrencies()
    {
        $result = (new YahooExchangeRateRateClient(new Client()))->getExchangeRatesForCurrencies([
            'ZAR', 'USD'
        ]);

        var_dump($result);

        $this->assertEquals(array_keys($result), ['ZAR', 'USD']);
        $this->assertEquals(1, $result['USD']);
    }
}
