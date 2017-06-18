<?php
namespace Mukuru\PurchaseOrderPolicies;

use Illuminate\Support\Facades\Mail;
use Mukuru\Mail\PurchaseOrderNotification;

class BritishPoundPolicy extends PolicyTemplate
{
    public function apply()
    {
        Mail::send(new PurchaseOrderNotification($this->purchaseOrder));
    }
}
