<?php

namespace Mukuru\PurchaseOrderPolicies;

use Mukuru\Order;

class PurchaseOrderPolicyFactory
{
    /**
     * @param Order $purchaseOrder
     * @return BritishPoundPolicy|EuroPolicy|null
     */
    public function create(Order $purchaseOrder)
    {
        switch ($purchaseOrder->currency->code) {
            case 'GBP': return new BritishPoundPolicy($purchaseOrder);
            case 'EUR': return new EuroPolicy($purchaseOrder);
            default:
                return null;
        }
    }
}