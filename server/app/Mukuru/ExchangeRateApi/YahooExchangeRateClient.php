<?php
namespace Mukuru\ExchangeRateApi;

use GuzzleHttp\Client;

class YahooExchangeRateRateClient implements ExchangeRateClientContract
{
    const BASEURL = 'http://query.yahooapis.com/v1/public/';
    const ENVURL = '&env=store://datatables.org/alltableswithkeys';

    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $currencies
     * @return mixed
     */
    public function getExchangeRatesForCurrencies(array $currencies)
    {
        $result = $this->buildRequestAndFetchData($currencies);
        return $this->formatResult($result);
    }

    /**
     * @param array $currencies
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    private function buildRequestAndFetchData(array $currencies)
    {
        $yql = $this->getFormattedYqlForRequest($currencies);
        return $this->client->request('GET', self::BASEURL . 'yql?q=' . $yql . '&format=json' . SELF::ENVURL);
    }

    /**
     * @param array $currencies
     * @return string
     */
    private function getFormattedYqlForRequest(array $currencies)
    {
        foreach ($currencies as &$currency) {
            $currency = '"'.$currency. '"';
        }
        return "select * from yahoo.finance.xchange where pair in (". implode(',', $currencies) .")";
    }

    /**
     * @param $result
     * @return array
     */
    private function formatResult($result)
    {
        $results = json_decode($result->getBody(), true);
        $formattedResults = [];
        foreach($results['query']['results']['rate'] as $result) {
            $formattedResults[rtrim($result['id'], '=X')] = $result['Rate'];
        }
        return $formattedResults;
    }
}
