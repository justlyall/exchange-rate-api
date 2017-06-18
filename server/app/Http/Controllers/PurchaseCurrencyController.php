<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Mukuru\CurrencyPurchaser;
use Mukuru\Order;

class PurchaseCurrencyController extends Controller
{
    /**
     * @var CurrencyPurchaser
     */
    private $currencyPurchaser;

    /**
     * @param CurrencyPurchaser $currencyPurchaser
     */
    public function __construct(CurrencyPurchaser $currencyPurchaser)
    {
        $this->currencyPurchaser = $currencyPurchaser;
    }

    /**
     * @return Order
     */
    public function purchase()
    {
        return $this->currencyPurchaser->purchase(Input::get('amount'), Input::get('currencyCode'));
    }
}