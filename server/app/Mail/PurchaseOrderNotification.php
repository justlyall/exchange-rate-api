<?php

namespace Mukuru\Mail;

use Mukuru\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseOrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    private $purchaseOrder;

    /**
     * @param Order $purchaseOrder
     */
    public function __construct(Order $purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mukuru.british_pound_email'))
            ->subject('A new purchase order was created')
            ->view('emails.purchase_order_notification')
            ->with($this->purchaseOrder->toArray());
    }
}
