<?php

namespace Tests\Unit;

use Mukuru\Order;
use Mukuru\PurchaseOrderPolicies\BritishPoundPolicy;
use Mukuru\PurchaseOrderPolicies\EuroPolicy;
use Mukuru\PurchaseOrderPolicies\PurchaseOrderPolicyFactory;
use Tests\TestCase;


class PurchaseOrderPolicyFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new PurchaseOrderPolicyFactory();

        $order = new Order();
        $order->currency = (object)['code' => 'ZAR'];
        $this->assertNull($factory->create($order));

        $order->currency = (object)['code' => 'GBP'];
        $this->assertInstanceOf(BritishPoundPolicy::class, $factory->create($order));

        $order->currency = (object)['code' => 'EUR'];
        $this->assertInstanceOf(EuroPolicy::class, $factory->create($order));
    }
}
