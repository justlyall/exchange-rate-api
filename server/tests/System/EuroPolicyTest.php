<?php

namespace Tests\Unit;

use Mukuru\Currency;
use Mukuru\Discount;
use Mukuru\Order;
use Mukuru\PurchaseOrderPolicies\EuroPolicy;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EuroPolicyTest extends TestCase
{
    use DatabaseMigrations;

    public function testApply_WithOrder_ShouldAddRecordToDiscountTable()
    {
        $order = Order::forceCreate([
            'amount_usd' => 200,
            'currency_id' => 1,
        ]);

        (new EuroPolicy($order))->apply();

        $discount = Discount::where('order_id', $order->id)->first();
        $this->assertEquals(4, $discount->amount_discount);
    }
}
