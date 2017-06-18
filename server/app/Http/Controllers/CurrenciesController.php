<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Mukuru\CurrencyRepository;

class CurrenciesController extends Controller
{
    /**
     * @var CurrencyRepository
     */
    private $currencyRepository;

    /**
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @return Collection|static[]
     */
    public function get()
    {
        return [
            'currencies' => $this->currencyRepository->all(),
            'currency_discount' => config('mukuru.euro_discount_rate')
        ];
    }
}