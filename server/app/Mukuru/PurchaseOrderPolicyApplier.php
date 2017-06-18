<?php

namespace Mukuru;

use Mukuru\PurchaseOrderPolicies\PurchaseOrderPolicyFactory;

class PurchaseOrderPolicyApplier
{
    /**
     * @var PurchaseOrderPolicyFactory
     */
    private $factory;

    /**
     * @param PurchaseOrderPolicyFactory $factory
     */
    public function __construct(PurchaseOrderPolicyFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Order $order
     */
    public function applyPolicyToPurchaseOrder(Order $order)
    {
        $policy = $this->factory->create($order);
        if ( ! is_null($policy)) {
            $policy->apply();
        }
    }
}