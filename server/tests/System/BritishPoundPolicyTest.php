<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Mail;
use Mukuru\Mail\PurchaseOrderNotification;
use Mukuru\Order;
use Mukuru\PurchaseOrderPolicies\BritishPoundPolicy;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BritishPoundPolicyTest extends TestCase
{
    public function testApply_WithOrder_ShouldAddRecordToDiscountTable()
    {
        Mail::fake();

        $order = (new Order())->fill([
            'amount_purchased' => 200,
            'currency_id' => 1,
            'amount_usd' => 0,
            'exchange_rate' => 0,
            'percentage_surchage' => 0,
            'amount_surcharge' => 0
        ]);

        (new BritishPoundPolicy($order))->apply();
        Mail::assertSent(PurchaseOrderNotification::class);
    }
}
