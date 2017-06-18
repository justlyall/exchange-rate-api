<?php

namespace Mukuru\PurchaseOrderPolicies;

use Mukuru\Order;

abstract class PolicyTemplate
{
    /**
     * @var Order
     */
    protected $purchaseOrder;

    /**
     * @param Order $purchaseOrder
     */
    public function __construct(Order $purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;
    }

    abstract public function apply();
}