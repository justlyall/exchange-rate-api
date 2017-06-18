<?php
namespace Mukuru\Providers;

use Illuminate\Support\ServiceProvider;

use Mukuru\Currency;
use Mukuru\CurrencyPurchaser;
use Mukuru\CurrencyRepository;
use Mukuru\Order;
use Mukuru\OrderRepository;
use Mukuru\PurchaseOrderPolicies\PurchaseOrderPolicyFactory;
use Mukuru\PurchaseOrderPolicyApplier;

class CurrencyPurchaseServiceProviders extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('purchaser', function() {
            return  new CurrencyPurchaser(
                new CurrencyRepository(new Currency()),
                new OrderRepository(new Order()),
                new PurchaseOrderPolicyApplier(new PurchaseOrderPolicyFactory())
            );
        });
    }
}
