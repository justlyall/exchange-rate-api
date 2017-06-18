<?php
namespace Mukuru\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Mukuru\ExchangeRateApi\ExchangeRateApi;
use Mukuru\ExchangeRateApi\YahooExchangeRateRateClient;

class ExchangeRateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('exchangerate', function() {
            $client = new YahooExchangeRateRateClient(new Client());
            return new ExchangeRateApi($client);
        });
    }
}
