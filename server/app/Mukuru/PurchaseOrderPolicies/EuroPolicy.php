<?php
namespace Mukuru\PurchaseOrderPolicies;

use Mukuru\Discount;

class EuroPolicy extends PolicyTemplate
{
    public function apply()
    {
        Discount::create([
            'order_id' => $this->purchaseOrder->id,
            'amount_discount' => $this->purchaseOrder->amount_usd * (config('mukuru.euro_discount_rate') / 100)
        ]);
    }
}
