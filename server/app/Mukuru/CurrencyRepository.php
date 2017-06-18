<?php
namespace Mukuru;

use Mukuru\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository
{
    /**
     * @var Currency
     */
    private $model;

    /**
     * @param Currency $model
     */
    public function __construct(Currency $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $currencies
     */
    public function updateOrCreateCurrencies(array $currencies)
    {
        foreach ($currencies as $currencyCode => $rate) {
            $this->model->updateOrCreate(
                ['code' => $currencyCode],
                ['rate' => $rate]
            );
        }
    }

    /**
     * @param string $currencyCode
     * @return mixed
     */
    public function getByCurrencyCode($currencyCode)
    {
        return $this->model->hasCurrencyCode($currencyCode)->firstOrFail();
    }

    /**
     * @return Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }
}
